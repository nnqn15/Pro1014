</main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <style>
                            .right-section .nav {
                                display: flex;
                                justify-content: end;
                                gap: 2rem;
                                align-items: center;
                            }

                            .tenuser {
                                padding-top: 10px;
                                font-size: 14px;
                                font-weight: 600;
                            }
                        </style>
                        <p class="tenuser"><?= $_SESSION['user']['HoTen'] ?></p>
                    </div>
                    <div class="profile-photo">
                        <a href="<?= BASE_URL ?>"><img src="<?= BASE_URL ?>public/upload/avatar/<?= $_SESSION['user']['HinhAnh'] ?>" alt="anh admin"></a>
                    </div>
                </div>

            </div>
            <!-- End of Nav -->
        </div>
        <!-- <script>
        const Orders = [
            {
                productName: 'JavaScript Tutorial',
                productNumber: '85743',
                paymentStatus: 'Due',
                status: 'Pending'
            },
            {
                productName: 'CSS Full Course',
                productNumber: '97245',
                paymentStatus: 'Refunded',
                status: 'Declined'
            },
            {
                productName: 'Flex-Box Tutorial',
                productNumber: '36452',
                paymentStatus: 'Paid',
                status: 'Active'
            },
        ]
    </script> -->

        <script>
            const sideMenu = document.querySelector('aside');
            const menuBtn = document.getElementById('menu-btn');
            const closeBtn = document.getElementById('close-btn');

            const darkMode = document.querySelector('.dark-mode');

            menuBtn.addEventListener('click', () => {
                sideMenu.style.display = 'block';
            });

            closeBtn.addEventListener('click', () => {
                sideMenu.style.display = 'none';
            });

            darkMode.addEventListener('click', () => {
                document.body.classList.toggle('dark-mode-variables');
                darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
                darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
            })


            Orders.forEach(order => {
                const tr = document.createElement('tr');
                const trContent = `
        <td>${order.productName}</td>
        <td>${order.productNumber}</td>
        <td>${order.paymentStatus}</td>
        <td class="${order.status === 'Declined' ? 'danger' : order.status === 'Pending' ? 'warning' : 'primary'}">${order.status}</td>
        <td class="primary">Details</td>
    `;
                tr.innerHTML = trContent;
                document.querySelector('table tbody').appendChild(tr);
            });
        </script>
        <script src="<?=BASE_URL?>assets/js/validate.js"></script>
</body>

</html>