<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"  content="text/html;charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <!-- Styles -->
        <link rel="stylesheet" href="{{getenv('APP_URL')}}css/home.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        
        {{-- unifesp--}}
        <link rel="stylesheet" type="text/css" href="https://webcode.unifesp.br/header-unifesp/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">

    <title>{{getenv('APP_NAME', $header_title)}}</title>
</head>
    <body>
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
        <div id="loaded">