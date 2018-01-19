<?php
/**
* Filter the collection based on the range to display (if number of records is higher than the max aload by page)
* @param array $arrRecords The data array for which to build the report list
* @param integer $intStartRecord The number of the first record to display results for
* @return void
* @access public
*/
function getCollectionList($arrRecords,$intStartRecord = 0) {
	global $pLang,$pConfig;

    $intTotalRecords = count($arrRecords);
    $intRangeRecords = $pConfig['report_max'];
    $intFirstRecord = $intStartRecord;
    $intLastRecord = intval($intFirstRecord) + intval($intRangeRecords);

    if ($intTotalRecords <= $intLastRecord) {
        $j = 0;
        for ($i = $intFirstRecord;$i < $intTotalRecords;$i++) {
            $arrRecordsResult[$j]=$arrRecords[$i];
            $j++;
        }
    } else {
        $j = 0;
        for ($i = $intFirstRecord;$i < $intLastRecord;$i++) {
            $arrRecordsResult[$j]=$arrRecords[$i];
            $j++;
        }
    }

    return($arrRecordsResult);
}
/**
* Generate collection caption to indicate hwich range of records is displayed (like 1-10/200)
* @param array $arrRecords The data array for which to build the report list
* @param integer $intStartRecord The number of the first record to display results for
* @return void
* @access public
*/
function getCollectionCaption($arrRecords,$intStartRecord = 0) {
	global $pLang,$pConfig;

    $intTotalRecords = count($arrRecords);
    $intRangeRecords = $pConfig['report_max'];
    $intFirstRecord = $intStartRecord+1;

    if ($intTotalRecords <= $intRangeRecords) {
        $intLastRecord = $intTotalRecords;
    } else {
        $intLastRecord = intval($intStartRecord) + intval($intRangeRecords);
        if ($intLastRecord > $intTotalRecords) {
            $intLastRecord = $intTotalRecords;
        }
    }

    $collectionCaption = '<span class="badge yellow darken-2">';
    $collectionCaption .= $intFirstRecord.'-'.$intLastRecord.' / '.$intTotalRecords;
    $collectionCaption .= '</span>';

    return($collectionCaption);
}
/**
* 
* @param array $arrRecords The data array for which to build the report list
* @param integer $intStartRecord The number of the first record to display results for
* @return void
* @access public
*/
function getCollectionPagination($arrRecords,$intStartRecord = 1,$strLinkURL = '') {
	global $pLang,$pConfig;

    // defin number of pagination to display between more and less button
    $intNumMaxPagination = 7;

    $intTotalRecords = count($arrRecords);
    $intRangeRecords = $pConfig['report_max'];
    $strResult = '';
    
    // All the records will fit on one page; nothing to do
    //if ($intTotalRecords <= $intRangeRecords || $intRangeRecords <= 0) {
    //    return($strResult);
    //}

    $strResult = '<ul class="pagination">';
     
    // calculate the number of page
    $intNumPagesNeeded = ceil($intTotalRecords / $intRangeRecords);
    
    // What's the base for this SET of records?
    $intSetBaseRecord = 0;
    for ($iPage = 1; $iPage < $intNumPagesNeeded; $iPage++) {
        if (($iPage * $intNumMaxPagination * $intRangeRecords) > $intStartRecord) {
            // Found our page set
            $intSetBaseRecord = ($iPage - 1) * $intNumMaxPagination * $intRangeRecords;
            break;
        }
    }

    // Check the need of less and more button
    if ($intNumPagesNeeded > $intNumMaxPagination) {
        if ($intSetBaseRecord > 0) {
            $blnNeedLessButton = true;
        } else {
            $blnNeedLessButton = false;
        }
        if ($intSetBaseRecord < ($intTotalRecords - $intNumMaxPagination * $intRangeRecords)) {
            $blnNeedMoreButton = true;
        } else {
            $blnNeedMoreButton = false;
        }
    } else {
        $blnNeedLessButton = false;
        $blnNeedMoreButton = false;
    }

    // Show the prior page and prior set navigators
    if ($intStartRecord > 0) {
        // Not showing the first page; show a link to the prior page
        $intBase = $intStartRecord - $intRangeRecords;
        $strLink = '<li><a href="'.$strLinkURL.'&amp;base='.$intBase.'">';
        $strRow .= $strLink.'<i class="material-icons">chevron_left</i></a></li> ';

        if ($blnNeedLessButton) {
            // Show the Back option to move to a different set of pages
            $intBase = $intSetBaseRecord - ($intNumMaxPagination * $intRangeRecords);
            $strLink = '<li><a href="'.$strLinkURL.'&amp;base='.$intBase.'">';
            $strRow .= $strLink.'Back</a></li> ';
        } else {
            $strRow .= '';
        }
    } else {
        $strRow .= '<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>';
        $strRow .= '';
    }

    // Show the regular page count navigators
    for ($iPage = 0; $iPage < $intNumPagesNeeded; $iPage++) {
        if (($iPage * $intRangeRecords) >= ($intSetBaseRecord + $intNumMaxPagination * $intRangeRecords)){
            break;
        }

        if (($iPage * $intRangeRecords) >= $intSetBaseRecord) {
            if (($iPage * $intRangeRecords) == $intStartRecord) {
                // Found the current page
                $strRow .= '<li class="active"><a href="#!">'.($iPage + 1).'</a></li>';
            } else {
                $intBase = $iPage * $intRangeRecords;
                $strLink = '<li><a href="'.$strLinkURL.'&amp;base='.$intBase.'">';
                $strRow .= $strLink.($iPage + 1).'</a></li>';
            }
        }
    }

    // Show the next page and next set navigators
    if ($intStartRecord < ($intTotalRecords - $intRangeRecords)) {
        if ($blnNeedMoreButton) {
            // Show the Back option to move to a different set of pages
            $intBase = $intSetBaseRecord + 7 * $intRangeRecords;
            $strLink = '<li class="page-item"><a href="'.$strLinkURL.'&amp;base='.$intBase.'">';
            $strRow .= $strLink.' More</a></li> ';
        } else {
            $strRow .= '';
        }

        // Not showing the first page; show a link to the prior page
        $intBase = $intStartRecord + $intRangeRecords;
        $strLink = '<li><a href="'.$strLinkURL.'&amp;base='.$intBase.'">';
        $strRow .= $strLink.'<i class="material-icons">chevron_right</i></a></li>';
    } else {
        $strRow .= '';
        $strRow .= '<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>';
    }

    $strResult .= $strRow;
    $strResult .= '</ul>';
    return($strResult);

}
/**
* Filter the collection based on the range to display (if number of records is higher than the max aload by page)
* @param array $arrRecords The data array for which to build the report list
* @param integer $intStartRecord The number of the first record to display results for
* @return void
* @access public
*/
function getCollectionSort($arrRecords, $strLinkURL = '') {
	
    $sort_btn .= '<ul id="sort" class="dropdown-content">';
    for ($i = 0;$i < count($arrRecords);$i++) {
	    $sort_btn .= '<li><a href="'.$strLinkURL.'&amp;sort='.$arrRecords[$i].'"> Sort by '.$arrRecords[$i].'</a></li>';  
    }
    $sort_btn .= '</ul>';

    return($sort_btn);
}
?>