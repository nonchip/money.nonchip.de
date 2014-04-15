<h2>Your accounts:</h2>
<table class="pure-table pure-table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>shortname</th>
            <th>balance</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach($accounts as $account): ?>
        <tr>
            <td><?=$account->id?></td>
            <td><?=$account->shortname?></td>
            <td class="balance<?=($account->balance<0?' negative':'')?>"><?=$account->balance?></td>
            <td><a href="/account/editForm/<?=$account->id?>" class="pure-button button-xsmall">Edit</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>
<a href="/account/editForm/0" class="pure-button pure-button-primary">New account</a>
