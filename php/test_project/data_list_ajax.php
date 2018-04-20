<?php

 require __DIR__ . '/_db_connect.php';

 $page_name = 'data_ajax';

 ?>

<?php include __DIR__ . '/_head.php' ?>

<body>

    <div class="container">
        <?php include __DIR__. '/_navbar.php' ?>


        <h2 class="page-title">DATA LIST</h2>


        <table class="table table-striped table_data_list" style="margin-top: 15px">
            <thead>
            <tr>
                <th class="th_sid">Sid</th>
                <th class="th_name">Name</th>
                <th class="th_mobile">Mobile</th>
                <th class="th_email">Email</th>
                <th class="th_birthday">Birthday</th>
                <th class="th_address">Address</th>
            </tr>
            </thead>
            <tbody id="list_tpl_tbody">

            </tbody>
        </table>


        <nav aria-label="Page navigation text-center">
            <ul class="pagination justify-content-center">
            </ul>
        </nav>


    </div>

    <script type="text/x-template" id="list_tpl">
        <tr>
            <td><%= sid %></td>
            <td><%= name %></td>
            <td><%= mobile %></td>
            <td><%= email %></td>
            <td><%= birthday %></td>
            <td><%= address %></td>
        </tr>
    </script>

    <script>

        let list_tpl = $('#list_tpl').text();
        let list_tpl_tbody = $('#list_tpl_tbody');
        let list_tpl_f = _.template(list_tpl);
        let pag_first = `<li class="page-item <%= isDisabled %>">
                    <a class="page-link" href="#1" aria-label="First">
                        <i class="fas fa-angle-double-left"></i>
                    </a>
                </li>`;
        let pag_prev = `<li class="page-item <%= isDisabled %>">
                    <a class="page-link" href="#<%= page %>" aria-label="Previous">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>`;
        let pag_num = `<li class="page-item <%= isActive %>">
                        <a class="page-link" href="#<%= i %>"><%= i %></a>
                    </li>`;
        let pag_next = `<li class="page-item <%= isDisabled %>">
                    <a class="page-link" href="#<%= page %>" aria-label="Next">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>`;
        let pag_last = `<li class="page-item <%= isDisabled %>">
                    <a class="page-link" href="#<%= total_page %>" aria-label="Last">
                        <i class="fas fa-angle-double-right"></i>
                    </a>
                </li>`;
        let pagination = $('.pagination');
        let pag_first_f = _.template(pag_first);
        let pag_prev_f = _.template(pag_prev);
        let pag_num_f = _.template(pag_num);
        let pag_next_f = _.template(pag_next);
        let pag_last_f = _.template(pag_last);

        let afterLoad = function (data) {
            let i, row;
            console.log(data);
            list_tpl_tbody.empty();
            for (i=0;i<data.data.length;i++) {
                // console.log(data.data[i]);
                row = data.data[i];
                list_tpl_tbody.append(list_tpl_f(row));
            }

            pagination.empty();

            if (data.page === 1){
                pagination.append(pag_first_f({ isDisabled: 'disabled' }));

            } else {
                pagination.append(pag_first_f({ isDisabled: '' }));
            }
            if (data.page === 1){
                pagination.append(pag_prev_f({ isDisabled: 'disabled', page: '#' }));

            } else {
                pagination.append(pag_prev_f({ isDisabled: '', page: data.page - 1 }));
            }
            for (i=1; i<= data.pages_num; i++) {
                if (i === data.page) {
                    pagination.append(pag_num_f({ isActive: 'active', i: i }));
                } else {
                    pagination.append(pag_num_f({ isActive: '', i: i }));
                }
            }
            if (data.page === data.pages_num){
                pagination.append(pag_next_f({ isDisabled: 'disabled', page: '#' }));

            } else {
                pagination.append(pag_next_f({ isDisabled: '', page: data.page + 1 }));
            }
            if (data.page === data.pages_num){
                pagination.append(pag_last_f({ isDisabled: 'disabled', total_page: data.pages_num }));

            } else {
                pagination.append(pag_last_f({ isDisabled: '', total_page: data.pages_num }));
            }

        };

        let whenHashchange = function(){
            let p = location.hash.slice(1);
            p = (p<1) ? 1 : p;
            $.get('data_list_json.php', {page: p}, afterLoad, 'json');
        };

        window.addEventListener('hashchange', whenHashchange);
        whenHashchange();

    </script>

<?php include __DIR__ . '/_foot.php' ?>