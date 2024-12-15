@extends("layouts.default")

@section("content")
    <!-- Begin page content -->
    <main class="flex-shrink-0 mt-5">
    <div class="container" style="max-width:1200px">

        @if (session()->has("success"))
            <div class="alert alert-success">
                {{session()->get("success")}}
            </div>
        @endif
        @if (session()->has("error"))
            <div class="alert alert-danger">
                {{session("error")}}
            </div>
        @endif

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="h4 mb-5 mt-1"><b>Welcome {{auth()->user()->name}}</b></div>

            <div class="row">
                <div class="col-md-6">
                    <h6 class="border-bottom pb-2 mb-0"><b>Pending Tasks</b></h6>
                    @foreach ($tasks as $task)
                        @if ($task->status == 'pending')
                            <div class="d-flex text-body-secondary pt-3">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="#c94a38"
                                class="icon icon-tabler icons-tabler-filled icon-tabler-alert-circle">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" />
                                </svg>
                              <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                <div class="d-flex justify-content-between">
                                  <strong class="text-gray-dark">{{$task->title}} | {{$task->deadline}} | Status: {{$task->status}}</strong>

                                <a href="{{route('task.status.update', $task->id)}}"
                                    class="btn btn-success"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"
                                    stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M5 12l5 5l10 -10" /></svg>
                                </a>

                                <a href="{{route('task.delete', $task->id)}}"
                                    class="btn btn-danger">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"
                                    stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 7l16 0" /><path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                </a>

                                </div>
                                <span class="d-block">{{$task->description}}</span>
                              </div>

                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="col-md-6">
                    <h6 class="border-bottom pb-2 mb-0"><b>Completed Tasks</b></h6>
                    @foreach ($tasks as $task)
                        @if ($task->status == 'completed')
                            <div class="d-flex text-body-secondary pt-3">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"
                                stroke="#008000"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-circle-dashed-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95" />
                                <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44" /><path d="M3.69 15.44a9 9 0 0 0 1.95 2.92" /><path d="M8.56 20.31a9 9 0 0 0 3.44 .69" /><path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95" /><path d="M20.31 15.44a9 9 0 0 0 .69 -3.44" />
                                <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92" /><path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69" />
                                <path d="M9 12l2 2l4 -4" /></svg>
                              <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                <div class="d-flex justify-content-between">
                                  <strong class="text-gray-dark">{{$task->title}} | {{$task->deadline}} | Status: {{$task->status}}</strong>


                                <a href="{{route('task.delete', $task->id)}}"
                                    class="btn btn-danger">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"
                                    stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 7l16 0" /><path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                </a>

                                </div>
                                <span class="d-block">{{$task->description}}</span>
                              </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            {{ $tasks->links() }} <!-- Single pagination -->

            </div>


    </div>
  </main>
@endsection
