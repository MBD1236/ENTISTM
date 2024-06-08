@extends('layouts.template-front-office-back')

@section('content')
    <div class="card">
        <div class="card-header card-head">
            <h1 class="bg-card text-center text-white card-head">
                <i class="fa fa-envelope me-1"></i>Les Abonnés à la Newsletter
            </h1>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Date d'abonnement</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subscribers as $key => $subscriber)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $subscriber->created_at}}</td>
                            <td>{{ $subscriber->email}}</td>
                        </tr>
                    @empty
                        <td colspan="3">Aucun abonné pour l'instant !</td>
                    @endforelse
                </tbody>
            </table>
            <div>
                <footer class="card-footer">
                    {{ $subscribers->links() }}
                </footer>
            </div>
        </div>
    </div>

    <script>
        function readURL(input, target) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    if (target.tagName === 'IMG') {
                        target.src = e.target.result;
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.getElementById('imageUpload').addEventListener('change', function() {
            var imgPreview = document.getElementById('imgPreview');
            readURL(this, imgPreview);
        });

        document.getElementById('programmeForm').addEventListener('submit', function() {
            document.getElementById('submitButton').disabled = true;
        });
    </script>
@endsection
