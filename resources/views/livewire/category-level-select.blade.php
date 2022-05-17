                                <div>
                                    <div class="form-group">
                                        <label for="category">Select Category</label>
                                        <select wire:model="selectedCategory" class="form-control">
                                            <option value="">  Select a Category </option>
                                            @foreach($parent_categories as $pcategory)
                                                <option value="{{$pcategory->id}}">{{$pcategory->name}}</option>
                                            @endforeach 
                                        </select>
                                        @error('category') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    
                                    @if(!is_null($subcategories))
                                    <div class="form-group">
                                        <label for="selectedSubcategory">Select a Subcategory</label>
                                        <select wire:model="selectedSubcategory" class="form-control">
                                                @if ($subcategories->count() == 0)
                                                    <option value="">-- Choose main category first --</option>
                                                @endif
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                                @endforeach
                                        </select>
                                        @error('subcategory') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    @endif
                                    @if(!is_null($childcategories))
                                    <div class="form-group">
                                        <label for="selectedChildcategory">Select a Child Category</label>
                                        <select wire:model="selectedChildcategory" class="form-control">
                                                @if ($childcategories->count() == 0)
                                                    <option value="">-- Choose sub category first --</option>
                                                @endif
                                                @foreach ($childcategories as $ccategory)
                                                    <option value="{{ $ccategory->id }}">{{ $ccategory->name }}</option>
                                                @endforeach
                                        </select>
                                 
                                        @error('childcategory') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    @endif
                                </div>
