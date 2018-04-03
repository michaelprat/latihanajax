<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"></meta>
<title> Contoh penggunaan ajax untuk dropdown bercabang di laravel menggunakan laravel collective</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<br>
</br>
{!!Form::open()!!}
{!! Form::select('id_negara',$negara,null,array('placeholder'=>"--Pilih Negara--",'id'=>"negara")) !!}
<br>
<br>
{!!Form::select('id_kota',null,null,array('placeholder'=>"--Pilih kota--",'id'=>"kota")) !!}

<br>
<br>
{!!Form::select('id_kecamatan',null,null,array('placeholder'=>"--Pilih kecamatan--",'id'=>"kecamatan")) !!}
{!!Form::close() !!}
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