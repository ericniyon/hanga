<?php

namespace App;

use App\Models\AffiliateCohort;
use App\Models\Affiliation;
use App\Models\Application;
use App\Models\ApplicationBaseModel;
use App\Models\BlockMember;
use App\Models\ClientAffiliate;
use App\Models\Connection;
use App\Models\GoogleRatings;
use App\Models\GoogleRevers;
use App\Models\JobOpportunity;
use App\Models\Message;
use App\Models\ProfileViews;
use App\Models\Rating;
use App\Models\RegistrationType;
use App\Models\SearchHistory;
use App\Notifications\ClientResetPassword;
use App\Traits\HasProfilePhoto;
use App\Traits\HasRating;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Double;

/**
 * App\Client
 *
 * @method static create(array $array)
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string|null $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $verified_at
 * @property string $phone
 * @property string|null $otp
 * @property string|null $verify_token
 * @property int|null $registration_type_id
 * @property string|null $profile_photo
 * @property-read string $profile_photo_url
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read RegistrationType|null $registrationType
 * @method static Builder|Client newModelQuery()
 * @method static Builder|Client newQuery()
 * @method static Builder|Client query()
 * @method static Builder|Client whereCreatedAt($value)
 * @method static Builder|Client whereEmail($value)
 * @method static Builder|Client whereId($value)
 * @method static Builder|Client whereName($value)
 * @method static Builder|Client whereOtp($value)
 * @method static Builder|Client wherePassword($value)
 * @method static Builder|Client wherePhone($value)
 * @method static Builder|Client whereProfilePhoto($value)
 * @method static Builder|Client whereRegistrationTypeId($value)
 * @method static Builder|Client whereRememberToken($value)
 * @method static Builder|Client whereUpdatedAt($value)
 * @method static Builder|Client whereVerifiedAt($value)
 * @method static Builder|Client whereVerifyToken($value)
 * @method static Builder|Client withoutMe()
 * @mixin Eloquent
 * @property string|null $name_slug
 * @property string|null $document_vectors
 * @property bool $allow_notification_sound
 * @property bool $is_active
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $expires_at
 * @property-read Collection|Affiliation[] $affiliations
 * @property-read int|null $affiliations_count
 * @property-read Collection|Affiliation[] $affiliationsEmployers
 * @property-read int|null $affiliations_employers_count
 * @property-read Application|null $application
 * @property-read BlockMember|null $blockMember
 * @property-read BlockMember|null $blockedMember
 * @property-read Collection|Connection[] $connectionRequestMe
 * @property-read int|null $connection_request_me_count
 * @property-read bool $blocked
 * @property-read bool $broken
 * @property-read string $default_photo_url
 * @property-read float $rating_average
 * @property-read mixed $rating_comment
 * @property-read mixed $rating_number
 * @property-read int $total_rating
 * @property-read string|null $type
 * @property-read string $type_name
 * @property-read Collection|Message[] $messages
 * @property-read int|null $messages_count
 * @property-read Collection|Connection[] $myConnectionRequest
 * @property-read int|null $my_connection_request_count
 * @property-read Collection|JobOpportunity[] $myOpportunities
 * @property-read int|null $my_opportunities_count
 * @property-read Collection|Rating[] $myRates
 * @property-read int|null $my_rates_count
 * @property-read Collection|ProfileViews[] $profileViews
 * @property-read int|null $profile_views_count
 * @property-read Collection|ProfileViews[] $profileVisits
 * @property-read int|null $profile_visits_count
 * @property-read Collection|Rating[] $ratings
 * @property-read int|null $ratings_count
 * @property-read Collection|GoogleRevers[] $google_rating
 * @property-read int|null $google_rating
 * @property-read Collection|SearchHistory[] $searchBy
 * @property-read int|null $search_by_count
 * @property-read Collection|SearchHistory[] $searchHistory
 * @property-read int|null $search_history_count
 * @method static Builder|Client active()
 * @method static Builder|Client connectedWithMe()
 * @method static Builder|Client mySuggestions()
 * @method static Builder|Client notConnectedWithMe()
 * @method static Builder|Client orderRating()
 * @method static Builder|Client orderSearch()
 * @method static Builder|Client whereAllowNotificationSound($value)
 * @method static Builder|Client whereDocumentVectors($value)
 * @method static Builder|Client whereExpiresAt($value)
 * @method static Builder|Client whereFirstName($value)
 * @method static Builder|Client whereIsActive($value)
 * @method static Builder|Client whereLastName($value)
 * @method static Builder|Client whereNameSlug($value)
 * @property string|null $searchtext
 * @property-read string $client_name
 * @property-read Rating|null $myRating
 * @method static Builder|Client searchByName($search)
 * @method static Builder|Client searchName($query)
 * @method static Builder|Client whereSearchtext($value)
 */
class Client extends Authenticatable
{
    use Notifiable, HasProfilePhoto, HasRating;

    protected $guarded = [];
    protected $appends = ['profile_photo_url', 'defaultPhotoUrl', 'typeName', 'name', 'clientName'];

//    protected $withCount=['ratings'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'verify_token',''];

    public function getNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClientResetPassword($token));
    }

    public function getTypeNameAttribute(): string
    {
        return $this->registrationType->name ?? "";
    }

    public static function getClientByPhoneNumber($phone_number)
    {
        return Client::query()->where('phone', '=', $phone_number)->first();
    }

    public function registrationType(): BelongsTo
    {
        return $this->belongsTo(RegistrationType::class);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $id = decryptId($value);
        return $this->find($id) ?? abort(404, "Client not found");
    }

    public function getTypeAttribute(): ?string
    {
        return $this->registrationType->name;
    }

    public function scopeWithoutMe(Builder $builder): Builder
    {
        return $builder->where('id', '!=', auth('client')->id());
    }

    public function application(): HasOne
    {
        return $this->hasOne(Application::class, "client_id", 'id');
    }

    public function searchHistory(): HasMany
    {
        return $this->hasMany(SearchHistory::class, "client_id");
    }

    public function messages(): HasMany
    {
        $id = $this->id;
        return $this->hasMany(Message::class, 'from')
            ->where("to", "=", auth('client')->id())
            ->orWhere(function (Builder $builder) use ($id) {
                $builder->where("from", "=", auth('client')->id())->where("to", $id);
            })->orderByDesc("id")->limit(10);
    }

    public function myConnectionRequest(): HasMany
    {
        return $this->hasMany(Connection::class, "requester_id")
            ->where("requester_id", auth('client')->id())
            ->where("status", "<>", Connection::REJECTED);
    }

    public function connectionRequestMe(): HasMany
    {
        return $this->hasMany(Connection::class, "friend_id")
            ->where("friend_id", auth('client')->id());
    }

    public function getRatingNumberAttribute()
    {
        $rating = $this->ratings()
            ->where("done_by_id", "=", auth()->guard("client")->id())
            ->first();

        return $rating->rating ?? 0;
    }

    public function getRatingCommentAttribute()
    {
        $rating = $this->ratings()
            ->where("done_by_id", "=", auth()->guard("client")->id())
            ->first();

        return $rating->comment ?? "";
    }



    public function countGoogleRating(int $number)
    {

        // $rating = $this->ratings()
        //     ->where("rating", "=", $number)
        //     ->count();

        // $total = $this->google_rating;

        // $total = $total == 0 ? 1 : $total;

        return 100;
    }

    public function countRating(int $number)
    {

        $rating = $this->ratings()
            ->where("rating", "=", $number)
            ->count();

        $total = $this->ratings_count;

        $total = $total == 0 ? 1 : $total;

        return ($rating / $total) * 100;
    }

    public function getTotalRatingAttribute(): int
    {
        return Rating::query()
            ->where("client_id", "=", $this->id)
            ->count();
    }

    public function ratings(): MorphMany
    {
        return $this->morphMany(Rating::class, "ratable");
    }

    public function blockedMember(): HasOne
    {
        return $this->hasOne(BlockMember::class, "blocked_id")->where("blocker_id", "=", auth()->guard('client')->id());
    }

    public function blockMember(): HasOne
    {
        return $this->hasOne(BlockMember::class, "blocker_id")->where("blocked_id", "=", auth()->guard('client')->id());
    }

    public function getBlockedAttribute(): bool
    {
        return $this->blockedMember()->count() > 0;
    }

    public function getBrokenAttribute(): bool
    {
        return $this->blockMember()->count() > 0;
    }

    public function getRatingAverageAttribute(): float
    {


        $sumRating = Rating::query()->where("client_id", "=", $this->id)
            ->sum("rating");

        $total = Rating::query()->where("client_id", "=", $this->id)
            ->count();

        $total = $total == 0 ? 1 : $total;

        return $sumRating / $total;
    }
    public function getGoogleRatingAttribute()
    {
        $sumRating = GoogleRatings::query()->get();


        // dd($this->id);
        // dd($sumRating->ratings);
        // $ratings = 1;

        // $total = GoogleRatings::all();

        // dd($this->id);
        // $total = $total == 0 ? 1 : $total;


        return $sumRating;
    }

    public function scopeNotConnectedWithMe(Builder $builder): Builder
    {
        $user = auth('client')->id();
        return $builder->where(function (Builder $builder) use ($user) {
            $builder->whereNotIn("id", Connection::where("requester_id", $user)->where("status", '<>', Connection::REJECTED)->get()->pluck("friend_id"))
                ->whereNotIn("id", Connection::where("friend_id", $user)->where("status", '<>', Connection::REJECTED)->get()->pluck("requester_id"));
        })->whereHas('application', function (Builder $builder) {
            $builder->whereNotIn("status", [Application::DRAFT]);
        });
    }

    public function scopeConnectedWithMe(Builder $builder): Builder
    {
        $user = auth('client')->id();
        return $builder->where(function (Builder $builder) use ($user) {
            $builder->whereIn("id", Connection::where("requester_id", $user)->where("status", Connection::ACCEPTED)->get()->pluck("friend_id"))
                ->orwhereIn("id", Connection::where("friend_id", $user)
                    ->where("status", Connection::ACCEPTED)->get()->pluck("requester_id"));
        })->whereHas('application', function (Builder $builder) {
            $builder->whereNotIn("status", [Application::DRAFT]);
        });
    }


    public function affiliations(): HasMany
    {
        return $this->hasMany(Affiliation::class);
    }

    public function scopeOrderSearch(Builder $builder): Builder
    {
        return $builder->orderByRaw("(select coalesce(count(r.id) + 1, 1) from search_histories r where r.client_id=clients.id) desc");
    }

    public function scopeMySuggestions(Builder $builder)
    {
        $user = auth('client')->user();
        $builder->where('registration_type_id', '<>', $user->registration_type_id)->orderByRaw("(select count(a.id) from application_service a inner join applications app on app.id = a.application_id  where app.client_id = clients.id and a.service_id in ( select s.service_id from application_service s where s.application_id = " . $user->application->id . ")) desc");
    }

    public function profileViews(): HasMany
    {
        return $this->hasMany(ProfileViews::class, "profile_id", "id");
    }

    public function profileVisits(): HasMany
    {
        return $this->hasMany(ProfileViews::class, "visitor_id", "id");
    }

    public function myOpportunities(): HasMany
    {
        return $this->hasMany(JobOpportunity::class, "client_id", "id");
    }

    public function myRates(): HasMany
    {
        return $this->hasMany(Rating::class, "done_by_id");
    }

    public function affiliationsEmployers(): HasMany
    {
        return $this->hasMany(Affiliation::class, "employer_id", "id");
    }

    public function searchBy(): HasMany
    {
        return $this->hasMany(SearchHistory::class, "search_by_id");
    }

    public function scopeActive(Builder $builder)
    {
        $builder->where('is_active', '=', true);
    }


    public function scopeSearchByName(Builder $builder, $search)
    {
/*
        $builder->when(!empty($search), function (Builder $query) use ($search) {
            $query->where(function (Builder $builder) use ($search) {
                $builder->orWhere('first_name', 'ilike', "%$search%")
                    ->orWhere('last_name', 'ilike', "%$$search%");
            });
        });*/
    }

    public function myRating(): HasOne
    {
        return $this->hasOne(Rating::class, 'ratable_id')
            ->where('ratable_type', '=', get_class($this))
            ->where('done_by_id', '=', auth('client')->id());
    }

// company
    public function getClientNameAttribute(): string
    {
        $type = $this->registrationType->name??'';
        if (is_null($this->application) || $this->application->status == ApplicationBaseModel::DRAFT)
        {
            return "";
        }

        if ($type == RegistrationType::DSP)
        {
            return $this->application->dspRegistration->company_name ? $this->application->dspRegistration->company_name : '';
        }
        elseif ($type == RegistrationType::MSME)
        {
            return $this->application->msmeRegistration->company_name;
        }
        elseif ($type == RegistrationType::iWorker)
        {
            return $this->application->iWorkerRegistration->name;
        }
        return '#';
    }

    public function scopeSearchName(Builder $builder, $query)
    {
        $builder->whereHas('application', function (Builder $builder) use ($query) {
            $builder->where(function (Builder $builder) use ($query) {
                $builder->whereHas('dspRegistration', function (Builder $builder) use ($query) {
                    $builder->where('company_name', "ilike", "%$query%");
                })->orWhereHas('msmeRegistration', function (Builder $builder) use ($query) {
                    $builder->where('company_name', "ilike", "%$query%");
                })->orWhereHas('iWorkerRegistration', function (Builder $builder) use ($query) {
                    $builder->where('name', "ilike", "%$query%");
                });
            });
        });
    }

    /**
     * The roles that belong to the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function aggregates()
    {
        return $this->belongsToMany(Client::class, 'client_aggregator', 'aggrerated_by', 'client')->withPivot('status');
    }

    /**
     * Get all of the cohorts for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cohorts()
    {
        return $this->hasMany(AffiliateCohort::class, 'client_id', 'id');
    }

    /**
     * The roles that belong to the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function aggregators()
    {
        return $this->belongsToMany(Client::class, 'client_aggregator', 'client', 'aggrerated_by')->withPivot('status');
    }

    /**
     * The roles that belong to the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function affiliatesTest()
    {
        return $this->belongsToMany(Client::class, 'client_affiliate', 'affiliated_by', 'affiliates')
        ->withPivot(['group','link'])->withTimestamps();
    }

    /**
     * The affiliates that belong to the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function affiliates()
    {
        return $this->hasMany(ClientAffiliate::class,'affiliates', 'id');
    }

    /**
     * The affiliator that belong to the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function affiliators()
    {
        return $this->hasMany(ClientAffiliate::class,'affiliated_by', 'id');
    }

    public function scopeSearch(Builder $builder,$key)
    {
        $builder->when(!empty($search), function (Builder $query) use ($key) {
            $query->where(function (Builder $builder) use ($key) {
                $builder->orWhere('first_name', 'ilike', "%$key%")
                    ->orWhere('last_name', 'ilike', "%$$key%")
                    ->orWhere('name', 'ilike', "%$$key%");
            });
        });
    }
}

