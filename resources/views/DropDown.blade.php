<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"></meta>
<title> Contoh penggunaan ajax untuk dropdown bercabang di laravel</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<br>
</br>
<form>
<select id="negara" style="witdh:350px">
<option value="">---Pilih Negara----</option>
@foreach($negara as $key)
<option value="{{$key->id}}">{{$key->nama}}</option>
@endforeach
</select>
<br>
<br>
<select id="kota" style="witdh:350px">
</select>
<br>
<br>
<select id="kecamatan" style="witdh:350px">
</select>
</form>
</body>
{{-- Javascript untuk mengambil data ke 2 berdasarkan data ke 1 --}}
<script type="text/javascript">
 $(document).ready(function()
 {
     //untuk mengambil fungsi jika terjadi perubahan terhadap dropdown pertama 
      $('#negara').on('change',function()
      {
          var id_negara=$(this).val();
          //mengetahui jika ada data yang dipilih di dropdown pertama
          if(id_negara)
          {
              $.ajax({
                  url: 'DropDown/ajax/'+id_negara,
                type:"GET",
                dataType:"json",
                success:function(data)
                {
                   console.log(data);
                   $('#kota').empty();
                   $.each(data,function(key,value){
                       $('#kota').append('<option value="'+value["id"]+'">'+value["nama"]+'</option>');

                   });      
                }

              });
          }
          else
          {
              //jika data yang dipilih kosong
              $('#kota').empty();
          }
      });
      $('#kota').on('change',function()
      {
        var id_kota=$(this).val();
          //mengetahui jika ada data yang dipilih di dropdown pertama
          if(id_kota)
          {
              $.ajax({
                  url: 'DropDownKecamatan/ajax/'+id_kota,
                type:"GET",
                dataType:"json",
                success:function(data)
                {
                   console.log(data);
                   $('#kecamatan').empty();
                   $.each(data,function(key,value){
                       $('#kecamatan').append('<option value="'+value["id"]+'">'+value["nama"]+'</option>');

                   });      
                }

              });
          }
          else
          {
              //jika data yang dipilih kosong
              $('#kecamatan').empty();
          }

      });
       
 });
 </script>
 </body>
 </html>