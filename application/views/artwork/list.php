<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Add/Modify ArtWorks</h4>
                </div>
                <div class="card-body">
                    <form action="<?=base_url('ArtWork/save')?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="type" value="new" id="type">
                        <input type="hidden" name="artwork_id" id="artwork_id">
                        <div class="form-group">
                            <label for="">ArtWork Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Artist</label>
                            <select name="artist" id="artist" class="form-control">
                                <option selected disabled>Select Artist</option>
                                <?php
                                if(count($artists) > 0){
                                    foreach($artists as $value){
                                        ?>
                                        <option value="<?=$value->artist_id?>"><?=$value->artist_name?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">ArtWork Image</label>
                            <input type="file" name="file" class="form-control" id="ArtWorkImage">
                            <p class="mt-1"><img height="60" width="60" id="artwork_image" alt=""></p>
                        </div>
                        <div class="form-group">
                            <button class="btn bg-navy" name="save">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">ArtWorks</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>By Artist</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach($artworks as $value){
                                    $data = $value;
                                    $data->description = str_replace("'"," ",$value->description);
                                    $data = json_encode($data);
                                    ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><img src="<?=base_url('uploads/artwork/'.$value->image)?>" width="40" height="40" alt=""></td>
                                        <td><?=$value->title?></td>
                                        <td><?=getArtistName($value->artist)?></td>
                                        <td>
                                            <button class="btn bg-info btn-xs edit" data-id='<?=$data?>''>Edit</button>
                                            <a href="<?=base_url('ArtWork/delWork/'.$value->artwork_id)?>" onclick="return confirm('Are you sure to delete?')" class="btn bg-danger btn-xs">Delete</a>

                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.edit').on("click", function(){
            var data = JSON.parse($(this).attr('data-id'));
            console.log(data)
            $('#type').val('old')
            $('#artwork_id').val(data.artwork_id)
            $('#title').val(data.title)
            $('#description').val(data.description)
            $('#artist [value="' + data.artist + '"]').attr("selected","selected")
            $('#artwork_image').attr('src', '<?=base_url('uploads/artwork/')?>' + data.image)
        });
    });
</script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#artwork_image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#ArtWorkImage").change(function(){
            readURL(this);
        });
    </script>