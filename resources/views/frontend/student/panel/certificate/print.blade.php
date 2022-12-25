
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    @page{
        size:A4 landscape;
        margin:10mm;
       }
       
       body{
        margin:0;
        padding:0;
        border:1mm solid #991B1B;
        height:188mm;
       }
       .border-pattern{
        position:absolute;
        left:4mm;
        top:-6mm;
        height:200mm;
        width:267mm;
        border:1mm solid #991B1B;
        background-color:#991B1B;
       background-image: url({{asset('frontend/assets/images/border-pattern.png')}})
       }
       .content{
        position:absolute;
        left:10mm;
        top:10mm;
        height:178mm;
        width:245mm;
        border:1mm solid #991B1B;
        background:white;
       }
       .inner-content{
        border:1mm solid #991B1B;
        margin:4mm;
        padding:10mm;
        height:148mm;
        text-align:center;
       }
       .inner-content{
        border:1mm solid #991B1B;
        margin:4mm;
        padding:10mm;
        height:148mm;
        text-align:center;
       }
       h1{
        text-transform:uppercase;
        font-size:35pt;
        margin-bottom:0;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        color: navy;
       }
       
       h2{
        font-size:24pt;
        margin-top:0;
        padding-bottom:1mm;
        display:inline-block;
        border-bottom:1mm solid #991B1B;
       }
       
       h2::after{
        content:"";
        display:block;
        padding-bottom:4mm;
        border-bottom:1mm solid #991B1B;
       }
       
       h3{
        font-size:20pt;
        margin-bottom:0;
        margin-top:10mm;
       }
       
       p{
        font-size:16pt;
       }
       .badge{
        width:200px;
        height:200px;
        position:absolute;
        right:20px;
        bottom:19px;
       }
       .logo{
        
        margin-top: 5px;
       }
       .hightH1{
        margin-top: -10px;
       }
       .hightH2{
        margin-top: 10px;
       }
       .fontColorAndFamily{
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        color: navy;
       }
       .namestyle{
        font-size: 30px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color:#991B1B;
      
       }

        .instructor{
        text-align:left;
        margin-top: 0mm;
       
       }

       .instructor h3{
        font-size: 18pt;
        color: navy;
       }
       .instructor p{
        font-size:12pt;
        color:#991B1B;
       }
</style>
<body>
<div class="border-pattern">
 <div class="content">
  <div class="inner-content">
   <h1 class="hightH1">Certificate of completion </h1>
   <img src="{{asset('frontend/assets/images/academy.jpg')}}" alt="Girl in a jacket" width="300" height="80"  class="logo">
   <h3 class="fontColorAndFamily">This is to Certify that</h3>
   <p class="namestyle" >{{$certificate->student->name}}</p>
   <h3 class="fontColorAndFamily">Has Successfully Completed The</h3>
   <p class="namestyle">{{$certificate->course->title}}</p>
   <p class="fontColorAndFamily">Program Conducted From {{$certificate->course->start_date}}  To {{$certificate->course->end_date}}</p>
   <div class="instructor">
   <h3  >Course Instructor</h3>
   <p  >{{$certificate->course->instructor->name}}</p></div>
 
   <div >
    <img class="badge"  src="{{asset('frontend/assets/images/certified.jpg')}}"/>
   </div>
  
  </div>
 </div>
</div> 
</body>
</html>
    
  
   
  