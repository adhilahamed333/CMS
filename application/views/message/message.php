<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="login col-sm-10 text-center" style="float:left;overflow-y:auto;height:100%;">
    <div class="dashbox">
        <h2>Messages</h2>
        <a href="<?php echo base_url(); ?>message/compose">
            <div class="item-card">
                <h3><img width="30px" height="30px" src="<?php echo base_url('assets/images/edit.svg') ?>">Compose Message</h3>
            </div>
        </a>
        <h3>My Messages</h3>

        <?php if ($messages) { ?>
            <table style="text-align:left; width: 100%">
                <colgroup>
                    <col style="width:10%">
                    <col style="width:15%">
                    <col style="width:20%">
                    <col style="width:50%">
                    <col style="width:5%">
                </colgroup>
                <tr>
                    <th>Date-Time</th>
                    <th>From</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th></th>
                </tr>
            </table>
            <?php foreach ($messages as $message) { ?>
                <div class="item-card">
                    <table style="text-align:left; width: 100%">
                        <colgroup>
                            <col style="width:10%">
                            <col style="width:15%">
                            <col style="width:20%">
                            <col style="width:50%">
                            <col style="width:5%">
                        </colgroup>
                        <tr>
                            <td><?php echo date('d/M/Y  h:i A', strtotime($message->time)); ?></td>
                            <td><?= $message->fromuser ?></td>
                            <td><?= $message->subject ?></td>
                            <td><?php echo substr($message->message, 0, 70) ?>...</td>
                            <td><a href="<?php echo base_url() . 'message/view/' . $message->mid; ?>">View</a></td>
                        </tr>
                    </table>
                </div>
                <?php }
        } else { ?><h4>No Messages</h4>
            <?php } ?>

                
                <h3>Sent Messages</h3>


                <?php if ($sent) { ?>
                    <table style="text-align:left; width: 100%">
                        <colgroup>
                            <col style="width:10%">
                            <col style="width:15%">
                            <col style="width:20%">
                            <col style="width:50%">
                            <col style="width:5%">
                        </colgroup>
                        <tr>
                            <th>Date-Time</th>
                            <th>To</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th></th>
                        </tr>
                    </table>
                    <?php foreach ($sent as $message) { ?>
                        <div class="item-card">
                            <table style="text-align:left; width: 100%">
                                <colgroup>
                                    <col style="width:10%">
                                    <col style="width:15%">
                                    <col style="width:20%">
                                    <col style="width:50%">
                                    <col style="width:5%">
                                </colgroup>
                                <tr>
                                    <td><?php echo date('d/M/Y  h:i A', strtotime($message->time)); ?></td>
                                    <td><?= $message->touser ?></td>
                                    <td><?= $message->subject ?></td>
                                    <td><?php echo substr($message->message, 0, 70) ?>...</td>
                                    <td><a href="<?php echo base_url() . 'message/view/' . $message->mid; ?>">View</a></td>
                                </tr>
                            </table>
                        </div>
                    <?php }
                } else { ?><h4>No Messages</h4>
                <?php } ?>
                <br>
    </div>
</div>
</div>