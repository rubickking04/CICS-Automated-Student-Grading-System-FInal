<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Grades </title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        .watermark {
            opacity: 0.2;
  font-size: 52px;
  color: 'black';
  background: '#ccc';
  position: absolute;
  padding-right: 2rem !important;
  padding-left: 2rem !important;
  background-position: center;
  cursor: default;
  user-select: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  /* top: 5px;
   bottom: 5px; */
  /* right: 5px; */
    }
.text-center{
    text-align: center;
}
.text-start{
    text-align: left;
    font-family: 'Montserrat', sans-serif;
}
.text-end{
    text-align: right;
}
p.g {
    font-size: 16px;
    line-height: 1.5em;
    margin-top: 0;
    text-align: center;
}
body,
body *:not(html):not(style):not(br):not(tr):not(code) {
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif,
        'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    position: relative;
}
.header {
    padding: 25px 0;
    text-align: center;
}
    </style>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
</head>
<body>
    <div class="w3-container header">
        <div class="w3-row">
            <div class="w3-quarter">
                <img src="{{public_path('/storage/images/zppsu.png')}}" alt="avatar" height="90px" width="90px">
            </div>
            <div class="w3-half">
                <p class="text-center g" style="font-size: 14px;">{{ __('Republic of the Philippines') }}</p>
                <p class="text-center g" style="font-size: 13px; font-weight:bold">{{ __('Zamboanga Peninsula Polytechnic State University') }}</p>
                <p class="text-center g" style="font-size: 14px; font-weight:bold">{{ __('College of Information and Computing Science') }}</p>
                <p class="text-center g" style="font-size: 14px">{{ __('R.T. Lim Boulevard Baliwasan, Zamboanga City') }}</p>
            </div>
            <div class="w3-quarter text-center">
                <img src="{{public_path('/storage/images/logo.png')}}" alt="avatar" height="90px" width="90px">
            </div>
        </div>
    </div>
    <hr>
    <div class="w3-card">
        <div class="w3-container w3-padding-16 w3-light-grey">
            <p class="text-start mb-5">{{ __('Name: ')}} <strong>{{ Auth::user()->name }}</strong> </p>
            <p class="text-start mb-5">{{ __('Age: ')}} <strong>20</strong> </p>
            <p class="text-start mb-5">{{ __('Gender: ')}} <strong>{{ Auth::user()->gender }}</strong> </p>
            <table class="w3-hoverable w3-bordered"  style="border-style: solid; margin-bottom: 2rem !important; table-layout:  auto; width: 100%; border-radius:10px;">
                <thead class="w3-blue" style ="font-size: 16px; letter-spacing: 0.03em;">
                    <tr>
                        <td style="font-weight: bold;  text-align: center;">{{ __('Subject') }}</td>
                        <td style="font-weight: bold;  text-align: center;">{{ __('Section') }}</td>
                        <td style="font-weight: bold; text-align: center;">{{ __('Midterm') }}</td>
                        <td style="font-weight: bold; text-align: center;">{{ __('Final') }}</td>
                        <th class="text-center" scope="col">{{ __('Total') }}</th>
                        <th class="text-center" scope="col">{{ __('Remarks') }}</th>
                        {{-- <td style="font-weight: bold; text-align: center;">{{ __('Instructor') }}</td> --}}
                    </tr>
                </thead>
                <div class="watermark">
                    <img src="{{ public_path('storage/images/logo.png') }}" height="55%" style="background-size: cover;" />
                </div>
                <tbody>
                    @foreach ($lesson as $lessons)
                    @if (empty($lessons->grades))
                                <tr>
                                    <td class="text-start" scope="row">{{ $lessons->subject.' - '.$lessons->description }}</td>
                                    <td class="text-center" scope="row">{{ $lessons->section }}</td>
                                    <td class="text-start" scope="row">{{ __(' ') }}</td>
                                    <td class="text-start" scope="row">{{ __(' ') }}</td>
                                    <td class="text-start" scope="row">{{ __(' ') }}</td>
                                    <td class="text-start" scope="row">{{ __(' ') }}</td>
                                </tr>
                                @else
                                <tr>
                                    <td class="text-start" scope="row">{{ $lessons->subject.' - '.$lessons->description }}</td>
                                    <td class="text-center" scope="row">{{ $lessons->section }}</td>
                                    <td class="text-center" scope="row">{{ $lessons->grades->midterm }}</td>
                                    <td class="text-center" scope="row">{{ $lessons->grades->finalterm }}</td>
                                    <td class="text-center" scope="row">{{ round(($lessons->grades->midterm + $lessons->grades->finalterm)/2, 2) }}</td>
                                    @if(round(($lessons->grades->midterm + $lessons->grades->finalterm)/2, 2) <= 3)
                                        <td class="text-center text-primary fw-bold" scope="row">{{ __('PASSED') }}</td>
                                    @else
                                        <td class="text-center  text-danger fw-bold" scope="row">{{ __('FAILED') }}</td>
                                    @endif
                                </tr>
                                @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
