@extends('dashboard.home')

@section('title', $head_text)

@section('content_header')
	<div class="content-header-inner">
		<h1>{!! $head_text !!}</h1>

		<a href="{{route('notes.index')}}">
			<button class="btn btn-info btn-sm"><i class="fa fa-undo"></i> Anuluj</button>
		</a>
	</div>
@stop


@section('content')

	<div class="diary-container">
		<div class="diary-container-body">

			@include('dashboard.common.errors', [ 'errors' => $errors ] )

			<form action="{{ route( 'notes.update' ) }}" id="form-note-insert" method="POST" novalidate enctype="multipart/form-data">
				@csrf

				<input type="hidden" name="noteId" value="{{$note->id}}" />

				<div class="" style="display: flex;padding: 40px 0;">
					<div class="diary-form-grid grid-size-2" style="flex:1;margin-bottom: 20px;">

						<div class="diary-form-row">
							<label for="teacher_id">{{__('dashboard/note.Nauczyciel')}}</label>
                            <input type="text" class="form-control" name="teacher_id" id="teacher_id" value="{{$user->meta->name}} {{$user->meta->surname}}" readonly>
						</div>

						<div class="diary-form-row">
							<label for="student_id">{{__('dashboard/note.Student')}}</label>
                            <select name="student_id" id="student_id" class="form-control input-md input-select2" required>
                                <option value="0" selected>{{__('dashboard/note.Student')}}</option>
                                @foreach($students as $student)
                                    <option value="{{$student->id}}" @if( old( 'student_id', $note->student_id) == $student->id ) selected @endif>
                                        {{$student->meta->name}} {{$student->meta->surname}}
                                    </option>
                                @endforeach
                            </select>

						</div>

						<div class="diary-form-row">
							<label for="subject_id">{{__('dashboard/note.Przedmiot')}}</label>
                            <select name="subject_id" id="subject_id" class="form-control input-md input-select2" required>
                                <option value="0" selected>{{__('dashboard/note.Przedmiot')}}</option>
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}" @if( old( '$subject_id', $note->subject_id) == $subject->id ) selected @endif>
                                        {{$subject->name}}
                                    </option>
                                @endforeach
                            </select>
						</div>

						<div class="diary-form-row">
							<label for="text">{{__('dashboard/note.Treść')}}</label>
                            <textarea id="text" name="text" placeholder="{{__('dashboard/note.Opis')}}" class="form-control input-md">{{old('text', $note->text)}}</textarea>
						</div>

						<div class="diary-form-row">
                            <label for="positiv">{{__('dashboard/note.Typ uwagi')}}</label>
                            <select name="positiv" id="positiv" class="form-control input-md" required>
                                <option value="1" selected>{{__('Negatywna')}}</option>
                                <option value="0" selected>{{__('Pozytywna')}}</option>
                            </select>

                        <div class="diary-form-row">
                            <label for="text">{{__('dashboard/note.Punkty')}}</label>
                            <textarea id="pkt" name="pkt" placeholder="{{__('dashboard/note.Punkty')}}" class="form-control input-md">{{old('pkt', $note->pkt)}}</textarea>
                        </div>

						<div class="form-btn-group form-rows" style="justify-content: flex-end;">
							<button class="action-button btn btn-success confirm"><i class="fas fa-check"></i> Zapisz</button>
						</div>

					</div>

				</div>
			</form>
		</div>
	</div>
@stop


@section('js')
	<script>
	@include('dashboard.common.errorsJs')
	</script>
	@include('dashboard.notes.js.create')
@stop
