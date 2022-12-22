@extends('frontend.instructor.panel.layouts.index' ,  ['active_btn' => 'dashboard'])

<style>
    @keyframes spin {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }

    .panel {
      font: 1.5em  'Urbanist', sans-serif;
      text-shadow: 1px 1px 2px , 0 0 1em #666666, 0 0 0.2em rgb(172, 53, 122);
      letter-spacing: 3px;
    }
    .panel ol  {
      /* Remove defaults */
      margin: 0;
      padding: 0;
      list-style: none;

      /* Use CSS grid for spacing between list items */
      display: grid;
      gap:20px

      /* Create counter */
      counter-reset: list;
    }

    .panel li {
      /* Use CSS grid for spacing between marker and list item contents */
      display: grid;
      grid-template-columns: min-content 700px;
      column-gap: 20px;
      font-size: 15px;
      font-weight: 400;
      /* Increment counter */
      counter-increment: list;
      border-radius: 30px;
      background-color:#B0E0E6 ;
    }

    .panel li::before {
      /* Set content to an empty string */
      content: counter(list);
      /* Add animation */
      animation: 3s linear 1s infinite spin;

      /* Create the box and center its contents */
      width: 60px;
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;

      /* Additional text styles */
      color:#FF1493;
    }
 .instruction{
  margin-left: 5%;
  font: 18px  'Urbanist', sans-serif;
  text-shadow: 1px 1px 2px , 0 0 1em #666666;
  letter-spacing: 3px;

}
    </style>
@section('instructor_panel')
    <div >
        <h5 style="text-align:center ">Instructor panel</h5>
        <span class="instruction" >Read these instructions to help you   <i class="ri-arrow-down-fill"></i>:</span>
    </div><br>
    <div class="panel" style="margin-right: 20px" >

        <ol>
            <li>To see all the courses you study it and to create others, click Courses on the left</li>
            <li>If you want to change your password,click on Edit Password on the left</li>

        </ol>
        </div>
@endsection
