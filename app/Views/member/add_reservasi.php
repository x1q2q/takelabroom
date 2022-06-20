<?= $this->extend('member/templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mx-3 mb-4"><span class="text-muted fw-light">reservasi /</span> Ajukan Reservasi </h4>
    <!-- Striped Rows -->
    <div class="card mx-3">
        <div class="input-group">
            <span class="input-group-text bg-primary">
                <i class="bx bx-search bx-sm text-white"></i>
            </span>
            <input type="text" class="form-control py-2" id="input-cari" placeholder="Cari labroom di sini ..." aria-label="Search..." aria-describedby="basic-addon-search31">
            <span class="input-group-text bg-primary">
                <select class="form-select" id="select-category" aria-label="Default select example">
                    <option selected="" value="all">Semua Kategori</option>
                    <?php foreach($category as $val): ?>
                        <option value="<?= $val->id_category?>"> <?= $val->name_category; ?></option>
                    <?php endforeach; ?>
                </select>
            </span>
        </div>
    </div>
    <div class="cards">
        <?php foreach($category as $val): ?>
            <div class="card card-category">
                <div class="card-header bg-primary">
                    <span class="card-title text-white">
                        <?= $val->name_category; ?>
                    </span>
                </div>
                <div class="card-body has-bg-img" style="background-image: url(
                    <?= base_url('assets/img/uploads/categories/'.$val->thumb_category); ?>)">
                    <div class="caption sld-up text-center">
                        <p><?= $val->desc_category; ?></p>
                        <a href="<?= site_url('member/add-reservation/'.$val->slug); ?>" 
                        class="btn text-center rounded-pill btn-primary">
                        Check Ruang Lab <span class="tf-icons bx bxs-chevrons-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!--/ Striped Rows -->
</div>
<style type="text/css">
.cards {
    display: flex;
    flex-wrap: wrap;
}
.card.card-category{
    box-sizing: border-box;
    margin: 1em;
    flex:1 1 auto;
    flex-direction: column;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 
        0 3px 1px -2px rgba(0,0,0,0.2), 
        0 1px 5px 0 rgba(0,0,0,0.3)
}
.card-body.has-bg-img{
    min-height: 210px;
    position: relative;
    border-radius: 0px 0px 6px 6px;
}
.card-body.has-bg-img:hover .caption{
    display: block!important;
}
.has-bg-img{
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
}
.card-header{
    padding:10px 20px;
    box-shadow: inset 0px -2px 2px rgba(0,0,0,0.2);
}
.card-title{
    font-size: 1.1rem;
}
.caption{
    animation: fadeIn .5s ease-in-out;
    background: rgba(0,0,0,0.7);
	width: 100%;
	display: none!important;
	padding: 20px;
	color:#fff;
	position: absolute;
	bottom: 0;
    align-items: start;
	top:0;
	left:0;
	right: 0;
    border-radius: 0px 0px 6px 6px;
    margin: 0 auto;
}
.caption p{
    font-size: 13px;
    text-align: left !important;
}
@keyframes fadeIn{
	from{
		opacity: 0;
	}to{
		opacity: 1;
	}
}
@media screen and (max-width: 40em) {
    .card.card-category {
       min-width: calc(50% -  2em);
    }
}
 
@media screen and (min-width: 41em) {
    .card.card-category {
        max-width: calc(33.3% - 2em);
    }
}
@media screen and (min-width: 70em) {
    .card.card-category {
        min-width: calc(33.3% - 2em);
    }
}

select.form-select{
    max-width: 200px;
    text-overflow: ellipsis;
}
#input-cari{
    font-size: 18px;
    font-weight: lighter;
}
</style>
<?= $this->endSection('content'); ?>

<?= $this->section('extrascript'); ?>
<!-- include script -->
<?= $this->endSection('extrascript'); ?>
