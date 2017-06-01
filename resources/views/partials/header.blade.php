  <meta name='copyright' content='@mongexserv'>
  <meta name='language' content='EN, FR'>
  <link href="http://data.ottawa.ca/img/favicon.ico" rel="icon" type="image/x-icon"/>


<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha256-Av2lUNJFz7FqxLquvIFyxyCQA/VHUFna3onVy+5jUBM= sha512-zyqATyziDoUzMiMR8EAD3c5Ye55I2V3K7GcmJDHbL49cXzFQCEA6flSKqxEzwxXqq73/M4A0jKFFJ/ysEhbExQ==" crossorigin="anonymous">

<!-- Latest compiled and minified CSS Bootstrap select -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/css/bootstrap-select.min.css">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
<!-- Jquery 2.0.1-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.1/jquery.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/js/bootstrap-select.min.js"></script>

<!-- D3.js for Stats visualisation -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css" />

<style type="text/css">
.filterWrap {
    background: #fff;
    padding: 0 30px;
    box-shadow: 3px 3px #c7c7c7;
}

ul li{
    display: inline;
    list-style: none;
    padding-left: 0px;
    padding-right: 10px;
  }
footer{
    border-top: 10px solid #666;
}
.bs-docs-featurette+.bs-docs-footer {
    margin-top: 0;
    border-top: 0;
}
@media (min-width: 768px)
.bs-docs-footer {
    text-align: left;
}
.bs-docs-footer {
    padding-top: 50px;
    padding-bottom: 50px;
    margin-top: 100px;
    color: #99979c;
    text-align: center;
    background-color: #2a2730;
}
 .search-form .form-group {
  float: right !important;
  transition: all 0.35s, border-radius 0s;
  width: 32px;
  height: 32px;
  background-color: #fff;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
  border-radius: 25px;
  border: 1px solid #ccc;
}
.search-form .form-group input.form-control {
  padding-right: 20px;
  border: 0 none;
  background: transparent;
  box-shadow: none;
  display:block;
}
.search-form .form-group input.form-control::-webkit-input-placeholder {
  display: none;
}
.search-form .form-group input.form-control:-moz-placeholder {
  /* Firefox 18- */
  display: none;
}
.search-form .form-group input.form-control::-moz-placeholder {
  /* Firefox 19+ */
  display: none;
}
.search-form .form-group input.form-control:-ms-input-placeholder {
  display: none;
}
.search-form .form-group:hover,
.search-form .form-group.hover {
  width: 100%;
  border-radius: 4px 25px 25px 4px;
}
.search-form .form-group span.form-control-feedback {
  position: absolute;
  top: -1px;
  right: -2px;
  z-index: 2;
  display: block;
  width: 34px;
  height: 34px;
  line-height: 34px;
  text-align: center;
  color: #3596e0;
  left: initial;
  font-size: 14px;
}
input {
    width: 100px;
    transition: ease-in-out, width .35s ease-in-out;
    color:black;
    font-size: 14px;
}
form#language{
  padding-top: 15px;
}
input:focus{
  color:blue;
  font-size: 16px;
  text-transform:uppercase;
  padding-left:5px;
}
     div.navbar, div.navbar-default, div.navbar-static-top{
          margin-bottom: 0;
        }
        div.jumbotron{
        //background-color: #333333;
        margin-bottom: 0;
        background-image: url("data:image/svg+xml,%3Csvg%20version%3D%271.1%27%20id%3D%27Layer_1%27%20xmlns%3D%27http%3A//www.w3.org/2000/svg%27%20xmlns%3Axlink%3D%27http%3A//www.w3.org/1999/xlink%27%20x%3D%270px%27%20y%3D%270px%27%0A%20%20%20%20%20width%3D%2736px%27%20height%3D%2736px%27%20viewBox%3D%27-7%20-7%2036%2036%27%20enable-background%3D%27new%20-7%20-7%2036%2036%27%20xml%3Aspace%3D%27preserve%27%3E%0A%3Cpath%20fill%3D%27white%27%20d%3D%27M5%2C0H0v5h-2V0h-5v-2h5v-5h2v5h5V0z%20M23%2C18h-5v5h-2v-5h-5v-2h5v-5h2v5h5V18z%27/%3E%0A%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: center -80px;
        min-height: 200px;
        color: #fff;
      }
      div.jumbotron {
    min-height: 350px;
    background-color: #33CC99;
    text-align: center;
    background-image: url("data:image/svg+xml,%3Csvg%20version%3D%271.1%27%20id%3D%27Layer_1%27%20xml…5h2v5h5V0z%20M23%2C18h-5v5h-2v-5h-5v-2h5v-5h2v5h5V18z%27/%3E%0A%3C/svg%3E");
     //background-image: url("https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Flag_of_Ottawa%2C_Ontario.svg/250px-Flag_of_Ottawa%2C_Ontario.svg.png");
     background-repeat:repeat;
     border-bottom: 10px solid #666;
}
      .jumbotron h1{
  padding-top: 20px;
}
div.jumbotron img{
  padding-bottom: 20px;
}
.active_link{
  color:blue;
  font-weight: bolder;
  font-style: italic;
}

</style>
