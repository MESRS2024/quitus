<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <ul class="list-inline">
        <li class="list-inline-item">
            <select wire:model="activeAcademicYear" class="form-control" wire:change="changeAcademicYear">
                @foreach($academicYear as $key=>$year)
                    <option value="{{$key}}">{{$year}}</option>
                @endforeach
            </select>
        </li>
        <li class="list-inline-item">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <select wire:model="activeRole" class="form-control" wire:change="change"  >
                        @foreach($roles as $key=>$role)
                            <option value="{{$key}}">{{$role}}</option>
                        @endforeach
                    </select>
                </li>
                <li class="list-inline-item">
                    <div class="loading-img" wire:loading>
                       <i class="fa fa-spinner fa-spin"></i>
                    </div>
                </li>
            </ul>

        </li>
    </ul>
</div>
