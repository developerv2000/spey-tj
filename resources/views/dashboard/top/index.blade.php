



@extends('dashboard.layouts.app')
@section('main')

<div class="main-table-container">
  <div class="main-table-container__inner">

    <table class="main-table" cellpadding="8" cellspacing="10">
      {{-- Table Head start --}}
      <thead>
        <tr>
          @php $reversedOrderType = App\Support\Helper::reverseOrderType($orderType); @endphp

          <th width="140">
            Изображ.
          </th>

          <th>
            Продукт
          </th>

          <th width="140">
            Действие
          </th>
        </tr>
      </thead> {{-- Table Head end --}}

      {{-- Table Body start --}}
      <tbody>
        @foreach ($items as $item)
        <tr>
          <td><img src="{{ asset('img/top-products/' . $item->image) }}"></td>
          <td>{{ $item->product->title }}</td>

          {{-- Actions --}}
          <td>
            <div class="table__actions">
              @include('dashboard.components.table.edit-link')
            </div>
          </td>
        </tr>
        @endforeach
      </tbody> {{-- Table Body end --}}
    </table>

    {{ $items->links('dashboard.layouts.pagination') }}
  </div>
</div>

@endsection
