<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\IworkerCertificate
 *
 * @property int $id
 * @property string $name
 * @property string $issuer
 * @property string $supporting_document
 * @property string $issuance_date
 * @property int $iworker_registration_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCertificate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCertificate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCertificate query()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCertificate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCertificate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCertificate whereIssuanceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCertificate whereIssuer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCertificate whereIworkerRegistrationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCertificate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCertificate whereSupportingDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCertificate whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 */
class IworkerCertificate extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $dates = ['issuance_date'];
}
