<nav class="navbar navbar-light bg-light navbar-expand-sm">
  <a class="navbar-brand" href="#">
    <img src="..." width="30" height="30" alt="logo">
    BlogKita
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-8" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="navbar-list-8">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategori
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
<form class="form-inline">
        <input class="form-control mr-2" type="search" placeholder="Cari Sesuatu" aria-label="Search">
        <button class="btn btn-info" type="submit">Cari Artikel</button>
      </form>
    </ul>
    
    <div class="right-side d-flex">
      <ul class="navbar-nav">
          <li class="nav-item dropdown dropleft">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="..." width="40" height="40" class="rounded-circle">
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Dashboard</a>
            <a class="dropdown-item" href="#">Edit Profile</a>
            <a class="dropdown-item" href="#">Log Out</a>
          </div>
        </li>   
      </ul>
    </div>
  </div>
</nav>
<?php
          include ("application/config/koneksi.php");         
                    $SQ = "SELECT * FROM artikel INNER JOIN  kategori";
                    $result = mysql_query($SQ);
    ?>             
          <select keyword="id_kategori" class="btn btn-primary" type="text" value="<?=$id_kategori['id_kategori']?>">
            <?php
              while ($editkategori = mysql_fetch_array($result))
            {             
        $isSelected = ($editkategori[id_proses] == $id_kategori) ? 'selected' : '';                          

              echo "
                <option value='$editkategori[id_kategori]' $isSelected>                  
                 $editkategori[id_kategori] | $editkategori[nama]
                </option>
              ";
            }?>
            
          </select>

          <script>
                      $(document).ready(function(){
                        $('#menu').change(function(){
                          var id = $(this).val();
                            $.ajax({
                              url:"<?php echo base_url('index.php')?>/admin/fetch_submenu",
                              method:"POST",
                              datatype:"json",
                              data:{
                                id:id
                                },
                              success:function(array)
                              {
                                var html='';
                                for(let index=0;index < array.lenght;index++){
                                  html += "<option>"+array[index].submenu+"option"
                                } 
                                $('#submenu').html(html);            
                              }
                            })
                          }
                        });
                    </script>