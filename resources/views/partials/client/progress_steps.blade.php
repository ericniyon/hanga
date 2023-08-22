
<style>

span {
  margin: 5px 0 0 0;

}
p {
  margin: 5px 0 0 0;
}
.step-progress {
  position: relative;
  width: 90%;
  padding: 0;
  margin: 2em auto;
}
.step-progress-bar {
  position: relative;
  width: 100%;
}
.step-progress-bar > .bars {
  position: absolute;
  top: calc(50% - (3px / 2));
  left: 0;
  width: 100%;
  list-style: none;
}
.step-progress-bar > .bars > .bar-default,
.step-progress-bar > .bars > .bar-active {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 3px;
}
.step-progress-bar > .bars > .bar-default {
  background-color: #ddd;
}
.step-progress-bar > .bars > .bar-defaultactive {
  background-color: #121B65;
}
.step-progress-bar > .bars > .bar-active {
  background-color: #ddd;
  width: 66.66666667%;
}
.step-progress-bar > .bars > .bar-activenes {
  background-color: #121B65;
  width: 66.66666667%;
}
.step-progress-bar > .markers {
  white-space: nowrap;
}
.step-progress-bar .markers > .mark {
  width: 20px;
  height: 20px;
  border: 3px solid #ddd!important;
  background-color: #fff!important;
  -webkit-border-radius: 25%;
  -moz-border-radius: 25%;
  border-radius: 25%;
  position: relative;
  display: inline-block;
  transform: translate(-50%, 0);
}
.step-progress-bar .markers > .marker {
  width: 20px;
  height: 20px;
  border: 3px solid #121B65!important;
  background-color: #fff!important;
  -webkit-border-radius: 25%;
  -moz-border-radius: 25%;
  border-radius: 25%;
  position: relative;
  display: inline-block;
  transform: translate(-50%, 0);
}
.mark:nth-last-child(3):first-child ~ .mark {
  margin-left: calc((100% - (2 * 20px)) / 2);
}
.mark:nth-last-child(4):first-child ~ .mark {
  margin-left: calc((100% - (3 * 20px)) / 3);
}
.mark:nth-last-child(5):first-child ~ .mark {
  margin-left: calc((100% - (4 * 20px)) / 4);
}
.mark:nth-last-child(6):first-child ~ .mark {
  margin-left: calc((100% - (5 * 20px)) / 5);
}
.mark:nth-last-child(7):first-child ~ .mark {
  margin-left: calc((100% - (6 * 20px)) / 6);
}
.step-progress-bar .markers > .mark-active {
  border-color: #121B65;
}
.step-progress-bar .markers > .mark-active::after {
  position: absolute;
  display: block;
  content: "";
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 8px;
  height: 8px;
  -webkit-border-radius: 25%;
  -moz-border-radius: 25%;
  border-radius: 25%;
  background-color: #121B65;
}
.step-progress-states {
  position: relative;
  width: 100%;
}
.step-progress-states > .states {
  white-space: nowrap;
}
.step-progress-states > .states > .state {
  position: relative;
  display: inline-block;
  width: 10%;
  height: auto;
  text-align: center;
  overflow: hidden;
  transform: translate(-50%, 0);
}
.state:nth-last-child(3):first-child ~ .state {
  margin-left: calc((100% - (2 * 10%)) / 2);
}
.state:nth-last-child(4):first-child ~ .state {
  margin-left: calc((100% - (3 * 10%)) / 3);
}
.state:nth-last-child(5):first-child ~ .state {
  margin-left: calc((100% - (4 * 10%)) / 4);
}
.state:nth-last-child(6):first-child ~ .state {
  margin-left: calc((100% - (5 * 10%)) / 5);
}
.state:nth-last-child(7):first-child ~ .state {
  margin-left: calc((100% - (6 * 10%)) / 6);
}

</style>



<div class="step-progress">
    <div class="step-progress-bar">
      <ul class="bars">
          @if ($item->status == "Replyed" )
          <li class="bar-default bar-defaultactive"></li>
            <li class="bar-active bar-activenes"></li>

        @elseif ($item->status == "ToProducer" )
        <li class="bar-default"></li>
        <li class="bar-active bar-activenes"></li>

        @elseif ($item->status == "ToAdmin" )
        <li class="bar-default"></li>

        <li class="bar-active bar-activenes"></li>

        @else
        <li class="bar-active bar-activenes"></li>
        <li class="bar-default"></li>


        @endif
      </ul>

      <ul class="markers">
        @if ($item->status == "Replyed" )
        <li class="mark marker mark-active"></li>
        <li class="mark marker mark-active"></li>
        <li class="mark marker mark-active"></li>
        <li class="mark marker mark-active"></li>
        @elseif ($item->status == "ToProducer" )
        <li class="mark marker mark-active"></li>
        <li class="mark marker mark-active"></li>
        <li class="mark marker mark-active"></li>
        <li class="mark"></li>
        @elseif ($item->status == "ToAdmin" )
        <li class="mark marker mark-active"></li>
        <li class="mark marker mark-active"></li>
        <li class="mark"></li>
        <li class="mark"></li>
        @else
        <li class="mark marker mark-active"></li>
        <li class="mark"></li>
        <li class="mark"></li>
        <li class="mark"></li>
        @endif
          {{-- @if ($item->status == "Pending" || $item->status == "ToAdmin" || $item->status == "ToProducer" || $item->status == "Replyed" )
          <li class="mark mark-active"></li>
          @else
          <li class="mark mark-active"></li>
          @endif
          @if($item->status == "ToAdmin" || $item->status == "ToProducer" || $item->status == "Replyed")

          <li class="mark mark-active"></li>
          @else
          <li class="mark "></li>
          @endif
          @if($item->status == "ToProducer" || $item->status == "Replyed")

          <li class="mark mark-active"></li>
          @else
          <li class="mark "></li>
          @endif
          @if($item->status == "Replyed")

          <li class="mark mark-active"></li>
          @else
          <li class="mark"></li>
            @endif --}}
      </ul>
    </div>
    <div class="step-progress-states">
      <ul class="states">
        <li class="state">
          <span>Submited</span>
          {{-- <p>Monday</p> --}}
        </li>
        <li class="state">
          <span>Admin Review</span>
          {{-- <p>Tuesday</p> --}}
        </li>
        <li class="state">
          <span>Target Aproved</span>
          {{-- <p>Wednesday</p> --}}
        </li>
        <li class="state">
          <span>Replied</span>
          {{-- <p>Wednesday</p> --}}
        </li>

      </ul>
    </div>
  </div>
