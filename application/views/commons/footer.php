










</div>
</div>
<script type="text/javascript" src="<?=base_url('bower_components/jquery/dist/jquery.js')?>"></script>
<script type="text/javascript" src="<?=base_url('bower_components/material-design-lite/material.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('resources/js/ajax/form.js')?>"></script>
<script type="text/javascript" src="<?=base_url('resources/js/ajax/delete.js')?>"></script>
<script type="text/javascript" src="<?=base_url('resources/js/dialogos.js')?>"></script>
<script type="text/javascript" src="<?=base_url('resources/js/jquery.mask.js')?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/, optional: true
                }
            }
        });
        $('.ip_address').mask('099.099.099.099');
        $('.mask_address').mask('00:00:00:00:00:00');

    });
</script>
</body>
</html>