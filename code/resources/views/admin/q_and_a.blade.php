@extends('../layouts.adminapp')

@section('content')
	<!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">Q&nbsp;And&nbsp;A</h6>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-left">Subject</th>
                          <th class="text-left">Question</th>
                          <th class="text-left">Answer</th>
                          <th class="text-left">Uploaded_By</th>
                          <th class="text-left">Uploaded_At</th>
                          <th class="text-left">Actions</th>
                          <!-- <th>Sodium (mg)</th>
                          <th>Calcium (%)</th>
                          <th>Iron (%)</th> -->
                        </tr>
                      </thead>
                      <tbody>

                      	@foreach($q_and_a as $q_and_a)
                        <tr>
                          <td class="text-left">{{ $q_and_a->subject }}</td>
                          <td class="text-left" style="white-space: pre-line;">{{ $q_and_a->question }}</td>
                          <td class="text-left" style="white-space: pre-line;">{{ $q_and_a->answer }}</td>
                          <td class="text-left">{{ $q_and_a->uploaded_by_admin }}</td>
                          <td class="text-left">{{ $q_and_a->created_at }}</td>
                          <td class="text-left">
                          	<!-- <button style="border:none;border-radius:3px;outline:none;background: transparent;background-color:#c0ed5f;color: black;padding:10px;padding-top: 5px;padding-bottom: 5px;">Update</button> -->

                          	<form method="post" action="/q-and-a-togglestatus" style="display: inline;">
                          	@csrf
                          	<input type="hidden" name="qandaId" value="{{ $q_and_a->id }}">
                          	@if($q_and_a->is_active==1)
                          	<input type="hidden" name="toggler" value="{{ $q_and_a->is_active }}">
                          	<button type="submit" style="border:none;border-radius:3px;outline:none;background: transparent;background-color:#ff7373;color: black;padding:10px;padding-top: 5px;padding-bottom: 5px;">Block</button>

                          	@elseif($q_and_a->is_active==0)
                          	<input type="hidden" name="toggler" value="{{ $q_and_a->is_active }}">
                          	<button type="submit" style="border:none;border-radius:3px;outline:none;background: transparent;background-color:#a4e0ae;color: black;padding:10px;padding-top: 5px;padding-bottom: 5px;">Unblock</button>
                          	@endif
                          	</form>

                          </td>
                          <!-- <td>87</td>
                          <td>20%</td>
                          <td>4%</td>
                          <td>6%</td> -->
                        </tr>
                        @endforeach


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>







              <!-- <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">Hoverable Table</h6>
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                        <tr>
                          <th class="text-left">Dessert (100g serving)</th>
                          <th>Calories</th>
                          <th>Fat (g)</th>
                          <th>Link</th>
                          <th>Carbs</th>
                          <th>Protein (g)</th>
                          <th>Sodium (mg)</th>
                          <th>Calcium (%)</th>
                          <th>Iron (%)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-left">Frozen yogurt</td>
                          <td>1.59</td>
                          <td>6.0</td>
                          <td>50</td>
                          <td>4.0</td>
                          <td>87</td>
                          <td>20%</td>
                          <td>4%</td>
                          <td>6%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Frozen yogurt</td>
                          <td>1.59</td>
                          <td>2.5</td>
                          <td>35</td>
                          <td>2.0</td>
                          <td>97</td>
                          <td>17%</td>
                          <td>2%</td>
                          <td>6%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Ice crean sandwich</td>
                          <td>1.4</td>
                          <td>4.0</td>
                          <td>40</td>
                          <td>8.0</td>
                          <td>83</td>
                          <td>14%</td>
                          <td>7%</td>
                          <td>6%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Eclair</td>
                          <td>1.7</td>
                          <td>3.0</td>
                          <td>34</td>
                          <td>6.0</td>
                          <td>67</td>
                          <td>17%</td>
                          <td>3%</td>
                          <td>6%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Cupcake</td>
                          <td>2.49</td>
                          <td>4.0</td>
                          <td>45</td>
                          <td>3.05</td>
                          <td>83</td>
                          <td>20%</td>
                          <td>9%</td>
                          <td>6%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Jellybean</td>
                          <td>0.78</td>
                          <td>5.2</td>
                          <td>35</td>
                          <td>2.0</td>
                          <td>27</td>
                          <td>18%</td>
                          <td>37%</td>
                          <td>6%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Gingerbread</td>
                          <td>1.59</td>
                          <td>6.0</td>
                          <td>50</td>
                          <td>4.0</td>
                          <td>87</td>
                          <td>20%</td>
                          <td>4%</td>
                          <td>5.7%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Lollipop</td>
                          <td>1.59</td>
                          <td>6.0</td>
                          <td>50</td>
                          <td>4.0</td>
                          <td>87</td>
                          <td>20%</td>
                          <td>4%</td>
                          <td>6.5%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Honeycomb</td>
                          <td>0.45</td>
                          <td>5.0</td>
                          <td>45</td>
                          <td>3.5</td>
                          <td>45</td>
                          <td>19%</td>
                          <td>26%</td>
                          <td>9%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Donut</td>
                          <td>0.67</td>
                          <td>5.0</td>
                          <td>56</td>
                          <td>3.34</td>
                          <td>67</td>
                          <td>23%</td>
                          <td>4%</td>
                          <td>1.8%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Kitkat</td>
                          <td>0.59</td>
                          <td>8.34</td>
                          <td>43</td>
                          <td>1.97</td>
                          <td>34</td>
                          <td>18%</td>
                          <td>13%</td>
                          <td>1.5%</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> -->
              <!-- <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">Striped Table</h6>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="text-left">Dessert (100g serving)</th>
                          <th>Calories</th>
                          <th>Fat (g)</th>
                          <th>Link</th>
                          <th>Carbs</th>
                          <th>Protein (g)</th>
                          <th>Sodium (mg)</th>
                          <th>Calcium (%)</th>
                          <th>Iron (%)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-left">Frozen yogurt</td>
                          <td>1.59</td>
                          <td>6.0</td>
                          <td>50</td>
                          <td>4.0</td>
                          <td>87</td>
                          <td>20%</td>
                          <td>4%</td>
                          <td>6%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Frozen yogurt</td>
                          <td>1.59</td>
                          <td>2.5</td>
                          <td>35</td>
                          <td>2.0</td>
                          <td>97</td>
                          <td>17%</td>
                          <td>2%</td>
                          <td>6%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Ice crean sandwich</td>
                          <td>1.4</td>
                          <td>4.0</td>
                          <td>40</td>
                          <td>8.0</td>
                          <td>83</td>
                          <td>14%</td>
                          <td>7%</td>
                          <td>6%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Eclair</td>
                          <td>1.7</td>
                          <td>3.0</td>
                          <td>34</td>
                          <td>6.0</td>
                          <td>67</td>
                          <td>17%</td>
                          <td>3%</td>
                          <td>6%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Cupcake</td>
                          <td>2.49</td>
                          <td>4.0</td>
                          <td>45</td>
                          <td>3.05</td>
                          <td>83</td>
                          <td>20%</td>
                          <td>9%</td>
                          <td>6%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Jellybean</td>
                          <td>0.78</td>
                          <td>5.2</td>
                          <td>35</td>
                          <td>2.0</td>
                          <td>27</td>
                          <td>18%</td>
                          <td>37%</td>
                          <td>6%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Gingerbread</td>
                          <td>1.59</td>
                          <td>6.0</td>
                          <td>50</td>
                          <td>4.0</td>
                          <td>87</td>
                          <td>20%</td>
                          <td>4%</td>
                          <td>5.7%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Lollipop</td>
                          <td>1.59</td>
                          <td>6.0</td>
                          <td>50</td>
                          <td>4.0</td>
                          <td>87</td>
                          <td>20%</td>
                          <td>4%</td>
                          <td>6.5%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Honeycomb</td>
                          <td>0.45</td>
                          <td>5.0</td>
                          <td>45</td>
                          <td>3.5</td>
                          <td>45</td>
                          <td>19%</td>
                          <td>26%</td>
                          <td>9%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Donut</td>
                          <td>0.67</td>
                          <td>5.0</td>
                          <td>56</td>
                          <td>3.34</td>
                          <td>67</td>
                          <td>23%</td>
                          <td>4%</td>
                          <td>1.8%</td>
                        </tr>
                        <tr>
                          <td class="text-left">Kitkat</td>
                          <td>0.59</td>
                          <td>8.34</td>
                          <td>43</td>
                          <td>1.97</td>
                          <td>34</td>
                          <td>18%</td>
                          <td>13%</td>
                          <td>1.5%</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> -->
            </div>
          </div>


          <!--  -->
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                  <h6 class="card-title">Add New</h6>
                  <div class="template-demo">
                    <div class="mdc-layout-grid__inner">
                      

                      <form action="/q-and-a/new" method="post">
                        @csrf

                        <div class="mdc-layout-grid__inner">





                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input class="mdc-text-field__input" name="subject" id="text-field-hero-input">
                          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label" style="">Subject</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>

                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input class="mdc-text-field__input" name="question" id="text-field-hero-input">
                          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label" style="">Question</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>

                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input class="mdc-text-field__input" name="answer" id="text-field-hero-input">
                          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label" style="">Answer</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>



                     

                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                          <button type="submit" style="border:none;border-radius:3px;outline:none;background: transparent;background-color:#c0ed5f;color: black;padding:50px;padding-top: 5px;padding-bottom: 5px;">Add</button>
                      </div>





                    </div>
                      </form>

                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--  -->

            <!-- <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                  <h6 class="card-title">Add New</h6>
                  <div class="template-demo">
                    <div class="mdc-layout-grid__inner">
                      

                      <form action="/q-and-a/new" method="post">
                      	@csrf
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input class="mdc-text-field__input" name="subject" id="text-field-hero-input">
                          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label" style="">Subject</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input class="mdc-text-field__input" name="question" id="text-field-hero-input">
                          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label" style="">Question</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input class="mdc-text-field__input" name="answer" id="text-field-hero-input">
                          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label" style="">Answer</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                      <br>
                      

                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                          <button type="submit">Add Question</button>
                      </div>

                      </form>

                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->



        </main>
        <!-- partial:../../partials/_footer.html -->
        <footer>
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                <span class="tx-14">Copyright © 2019 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex justify-content-end">
                <div class="d-flex align-items-center">
                  <a href="">Documentation</a>
                  <span class="vertical-divider"></span>
                  <a href="">FAQ</a>
                </div>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
@endsection



