<?php
# SPDX-FileCopyrightText: ©  Basil Peace
# SPDX-License-Identifier: GPL-2.0-or-later

function is_bug( $severity ) {
  return
    $severity == BUG_TRIVIAL ||
    $severity == BUG_TEXT ||
    $severity == BUG_MINOR ||
    $severity == BUG_MAJOR ||
    $severity == BUG_CRASH ||
    $severity == BUG_BLOCK ||
    $severity == BUG_COMPLIANCE ||
    $severity == BUG_SECURITY ||
    $severity == BUG_LEGAL
  ;
}


/**
 * Hook to validate field issue data before updating
 * Verify that the proper fields are set with the appropriate values before proceeding
 * to change the status.
 * In case of invalid data, this function should call trigger_error()
 *
 * @param integer $p_issue_id       Issue number that can be used to get the existing state.
 * @param BugData $p_new_issue_data Is an object (BugData) with the appropriate fields updated.
 * @param string  $p_bugnote_text   Bugnote text.
 * @return void
 */
function custom_function_override_issue_update_validate( $p_issue_id, BugData $p_new_issue_data, $p_bugnote_text ) {
	if( $p_bug_data->status >= PENDING_ESTIMATION && $p_bug_data->status < CLOSED ) {
    if( is_bug( $p_bug_data->severity ) ) {
      if( !( $p_bug_data->reproducibility == REPRODUCIBILITY_ALWAYS || $p_bug_data->reproducibility == REPRODUCIBILITY_RANDOM ) ) {
        error_parameters( 'bug should be reproduced before estimating' );
        trigger_error( ERROR_VALIDATE_FAILURE, ERROR );
      }
    } else {
      if( !( $p_bug_data->reproducibility == REPRODUCIBILITY_NOTAPPLICABLE ) ) {
        error_parameters( 'reproducibility is not applicable for non-bugs' );
        trigger_error( ERROR_VALIDATE_FAILURE, ERROR );
      }
    }
  }
  if( $p_bug_data->status > PENDING_PRIORITIZATION && $p_bug_data->priority == NONE ) {
		error_parameters( 'priority can\'t be none for prioritized issues' );
		trigger_error( ERROR_VALIDATE_FAILURE, ERROR );
	}
  if( $p_bug_data->status > PENDING_PLANNING && empty( $p_bug_data->target_version ) ) {
		error_parameters( 'target version should be non-empty for planned issues' );
		trigger_error( ERROR_VALIDATE_FAILURE, ERROR );
	}
  if( $p_bug_data->status > PENDING_ASSIGNMENT && 0 == $p_bug_data->handler_id ) {
		error_parameters( 'issue should be assigned to someone' );
		trigger_error( ERROR_VALIDATE_FAILURE, ERROR );
  }
  if( $p_bug_data->status == VERIFICATION_REQUIRED ) {
    if( is_bug( $p_bug_data->severity ) && empty( $p_bug_data->fixed_in_version ) ) {
      error_parameters( 'fixed_in_version should be set for resolved bugs' );
      trigger_error( ERROR_VALIDATE_FAILURE, ERROR );
    }
    // resolution should be filled

    // work_progression
	}
  if( $p_bug_data->status == CLOSED && (
    $p_bug_data->reproducibility == REPRODUCIBILITY_UNABLETOREPRODUCE xor $p_bug_data->resolution == UNABLETOREPRODUCE
  ) ) {
		error_parameters( 'resolution should be consistent with (non-)reproducibility' );
		trigger_error( ERROR_VALIDATE_FAILURE, ERROR );

    // can't just close reproduced bugs etc.
  }
}
