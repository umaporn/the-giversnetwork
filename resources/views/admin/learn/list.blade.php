@forelse( $learns as $learn )
    <tr>
        <td>{{ $learn->id }}</td>
        <td>{{ $learn->title }}</td>
        <td>{{ $learn->view }}</td>
        <td><i class="far fa-check-square"></i></td>
        <td><a href="#"><i class="fas fa-link"></i></a></td>
        <td><a href="#"><i class="fas fa-pen"></i></a></td>
        <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
@empty
    <tr>
        <td class="not-found" colspan="3">@lang('learn.learn_management.not_found_learn')</td>
    </tr>
@endforelse