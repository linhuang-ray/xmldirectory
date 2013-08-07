<?php header ("Content-Type:text/xml"); ?>
<?php 
    echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<CiscoIPPhoneDirectory>
    <Title><?php echo $company[0]['title']; ?></Title>
    <Prompt><?php echo $company[0]['prompt']; ?></Prompt>
    <DirectoryEntry>
       <?php foreach ($entries as $row): ?>
        <Name><?php echo $row['name'];?></Name>
        <Telephone><?php echo $row['telephone']; ?></Telephone>
       <?php       endforeach; ?>
    </DirectoryEntry>
</CiscoIPPhoneDirectory>