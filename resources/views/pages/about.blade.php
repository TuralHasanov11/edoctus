@extends('layouts.app')

@section('title','Haqqımızda - '.env('APP_NAME'))

@section('content')
<section class="contact-section section_padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title text-center">Haqqımızda</h2>
        </div>
        <div class="col">
            <div class="row justify-content-between">
                <div class="col-12 col-md-5">
                  <b>Medicus</b> - bir idea olaraq beynəlxalq <a href="https://enactus.org/">Enactus</a> yarışı çərçivəsində irəli sürülmüş 
                  və daha sonra <a href="http://www.bhos.edu.az/">Baki Ali Neft Məktəbinin</a> tələbələri tərəfindən veb-səhifə olaraq hazırlanmışdır. 
                  Bir komanda olaraq, bizim məqsədimiz pandemiya dövründə insanları 
                  Covid-19 barədə düzgün məlumatlandırmaq və xəstəliyin ilkin simptomları aşkarlandığı halda həkimlərlə 
                  onlayn şəkildə əlaqə də ola biləcəkləri platforma yaratmaqdır. 
                  İnanırıq ki, təqdim etdiyimiz veb-səhifə insanları virusdan necə qorunmaq və virusa yoluxduqları 
                  halda hansı tədbirləri həyata keçirməklə bağlı maarifləndirəcək və cəmiyyətin virusla mübarizəsində 
                  güclü müdafiə rolu oynayacaqdır. Həmçinin istifadəçilərin müəyyən məsələlərlə bağlı sualları yarandıqda,
                  bu suallar platformamızda paylaşmaqla həkimlər və ya digər istifadəçilər tərəfindən cavablandırıla bilər 
                </div>
                <div class="col-12 col-md-6">
                    <img class="d-block my-3" src="https://enactus.s3.amazonaws.com/assets/enactus-org/large/home-logo.png" alt="Enactus">
                    <hr>
                    <img class="d-block my-3" src="https://lh3.googleusercontent.com/proxy/Br6Vm590NeXAAwQu9dguhjWdswb_rTn2vl5Tlf-hL5oAQSkzDKucSd20k_xHPulaKXi9MYYZD_9GIs35kQMJppojIHG_bSj2Uog9StLvlVfSVbvb" alt="">
                </div>
            </div>
            <p></p>
        </div>
        
      </div>
    </div>
  </section>
@endsection

