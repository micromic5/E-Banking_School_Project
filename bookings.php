<?php 
require_once '/includes/includeHeader.php';
require_once '/entity/accountEntity.php';
if(login_check($db) == true) 
{
    ?>
        <h2>Account History</h2>
        <select onchange="changeAccount()">
            <option value="0">
                Wähle ein Konto
            </option>
            <?php
            foreach($loggedUser->getAccountsPermissions() as $ap){
                $account = $ap->getAccount();
            ?>
            <option value="<?=$account->getPK_accountNumber()?>">
                    <?=$account->getPK_accountNumber()." - ".$account->getAccountType()->getName()?>
            </option>
            <?php
            }
            ?>
        </select>
        <?php
        if(!empty($_GET["PK_account"])){            
            $userAccount = new Account($_GET["PK_account"]);
            $received = $userAccount->getReceivedBookings();
            $transmitted = $userAccount->getTransmittedBookings();
                ?>
                <span><?=$userAccount->getPK_accountNumber()." ".$userAccount->getAccountType()->getName()?>:</span>
                <table>
                    <thead>
                        <th>Erhalten von</th>
                        <th>Erhalten am</th>
                        <th>Betrag</th>
                        <th>Type</th>
                    </thead>
                    <tbody>
                <?php            
                foreach($userAccount->getAllBookings() as $booked){
                    if(strtotime($booked->getDueTime())<=strtotime("today")){
                    ?>
                        <tr>
                        <td><?= $booked->getTransmitter()->getPK_accountNumber()?></td>
                        <td><?=date("d.m.Y",strtotime($booked->getDueTime()))?></td>
                        <td><?=$booked->getValue()?></td>
                        <td><?php
                            if(in_array($booked,$received)){
                                ?>
                                Erhalten    
                                <?php
                            }else if(in_array($booked,$transmitted)){
                                ?>
                                Gesendet
                                <?php
                            }else{
                                ?>
                                Nich definiert
                                <?php
                            }
                            ?>
                        </td>
                        </tr>
                    <?php
                    }
                }
                ?>
                    </tbody>
                </table>
                <?php
        }
}
else 
{
    ?>
        <p>You are not authorized to access this page, please login.</p>
    <?php
}
?>
<?php
    require_once '/includes/includeFooter.php';
?>
<script type="text/javascript">
function changeAccount(){
    window.location="bookings.php?PK_account="+jQuery("select").val();
}
</script>