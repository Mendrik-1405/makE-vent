@extends('master')

@section('title', 'ajouter un artiste')

@section('content')
<?php
    $totalartiste=null;
    $totalsonorisation=null;
    $totallogistique=null;
    $totallieu=null;
    $totalautreparam=null;
    $total=null;
?>
@foreach ($data as $row)
<?php
    $totalartiste=$row->totalartiste;
    $totalsonorisation=$row->totalsonorisation;
    $totallogistique=$row->totallogistique;
    $totallieu=$row->totallieu;
    $totalautreparam=$row->totalautreparam;
    $total=$row->total;
?>

@endforeach
<!-- Pie Chart -->
<div id="pieChart" style="min-height: 400px;" class="echart"></div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    echarts.init(document.querySelector("#pieChart")).setOption({
      title: {
        text: "<?php echo 'Diagramme'; ?>",
        subtext: 'statistique des depenses',
        left: 'center'
      },
      tooltip: {
        trigger: 'item'
      },
      legend: {
        orient: 'vertical',
        left: 'left'
      },
      series: [{
        name: 'Dépense ',
        type: 'pie',
        radius: '50%',
        data: [{
            value: "<?php echo $totalartiste ?>",
            name: 'artiste'
          },
          {
            value: "<?php echo $totalsonorisation ?>",
            name: 'sonorisation'
          },
          {
            value: "<?php echo $totallieu ?>",
            name: 'lieu'
          },
          {
            value: "<?php echo $totalautreparam ?>",
            name: 'autre'
          },
          {
            value: "<?php echo $totallogistique ?>",
            name: 'logistique'
          }
        ],
        emphasis: {
          itemStyle: {
            shadowBlur: 10,
            shadowOffsetX: 0,
            shadowColor: 'rgba(0, 0, 0, 0.5)'
          }
        }
      }]
    });
  });
</script>
<!-- End Pie Chart -->

<script src="{{asset('assets/assets/echarts/echarts.min.js')}}"></script>
@endsection