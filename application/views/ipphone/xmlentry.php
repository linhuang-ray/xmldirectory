<?php header("Content-Type:text/xml charset=UTF-8"); ?>
<?php echo "<?xml version=\"1.0\"?>\n"; ?>

<CiscoIPPhoneDirectory>
    <Title><?php echo $company['title']; ?></Title>
    <Prompt><?php echo $company['prompt']; ?></Prompt>
    <?php if(isset($entries) && !empty($entries)): ?>
    <?php foreach ($entries as $row): //for each entry display the entry as following format?>
        <DirectoryEntry>
            <Name><?php echo $row['first_name'].' '.$row['last_name']; ?></Name>
            <Telephone><?php echo $row['telephone']; ?></Telephone>
        </DirectoryEntry>
    <?php endforeach; ?>
<?php endif; ?>
</CiscoIPPhoneDirectory>
