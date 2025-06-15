@foreach ($bookings as $booking)
<tr>
    <td>{{ $booking->user->name }}</td>
    <td>{{ $booking->room->nama_ruangan }}</td>
    <td>{{ $booking->tanggal }}</td>
    <td>{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
    <td>
        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')
            <select name="status" onchange="this.form.submit()">
                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="diterima" {{ $booking->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="ditolak" {{ $booking->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </form>
    </td>
</tr>
@endforeach
