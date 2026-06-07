<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tracking Off Karyawan</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#eef2f7;
}

.container{
    width:95%;
    max-width:1400px;
    margin:auto;
    padding:30px 0;
}

.header{
    margin-bottom:25px;
}

.header h1{
    font-size:38px;
    color:#1f2937;
}

.header p{
    color:#6b7280;
}

.card{
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.card:hover{
    transform:translateY(-4px);
}

input,
select{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:10px;
    margin-top:5px;
    margin-bottom:15px;
}

input:focus,
select:focus{
    outline:none;
    border-color:#2563eb;
}

.btn{
    width:100%;
    border:none;
    padding:12px;
    border-radius:10px;
    cursor:pointer;
    color:white;
    font-weight:bold;
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
}

.btn:hover{
    opacity:.9;
}

.btn-delete{
    background:#dc2626;
    color:white;
    padding:7px 12px;
    border-radius:8px;
    text-decoration:none;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th{
    background:#2563eb;
    color:white;
    padding:12px;
}

table td{
    padding:12px;
    border-bottom:1px solid #ddd;
}

.badge{
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:bold;
}

.success{
    background:#16a34a;
}

.danger{
    background:#dc2626;
}

.info{
    background:#0284c7;
}

@media(max-width:900px){

    .grid{
        grid-template-columns:1fr !important;
    }

    table{
        font-size:12px;
    }
}

</style>

</head>
<body>

<div class="container">

    @yield('content')

</div>

</body>
</html>