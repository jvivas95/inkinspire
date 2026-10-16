<p><strong>Nombre:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Motivo:</strong> {{ $data['reason'] }}</p>
<p><strong>Mensaje:</strong></p>
<p>{!! nl2br(e($data['message'])) !!}</p>
