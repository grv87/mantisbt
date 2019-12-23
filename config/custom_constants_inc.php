<?php
# SPDX-FileCopyrightText: ©  Basil Peace
# SPDX-License-Identifier: GPL-2.0-or-later

define( 'FEEDBACK_REQUIRED', FEEDBACK /* 20 */ );
define( 'PENDING_ESTIMATION', CONFIRMED /* 40 */ );
define( 'PENDING_PRIORITIZATION', 42 );
define( 'PENDING_PLANNING', 44 );
define( 'PENDING_ASSIGNMENT', 46 );
define( 'HELP_WANTED', 49 );
define( 'IN_PROGRESS', 55 );
define( 'VERIFICATION_REQUIRED', RESOLVED /* 80 */ );

# priority
define( 'PERFECTING', 15 );
define( 'MEDIUM', NORMAL /* 30 */ );

# severity
define( 'QUESTION', 5 );
define( 'USER_STORY', 8 );
define( 'NEW_FEATURE', FEATURE /* 10 */ );
define( 'ENHANCEMENT', 12 );
define( 'BUG_TRIVIAL', TRIVIAL /* 20 */ );
define( 'BUG_TEXT', TEXT /* 30 */ );
define( 'BUG_MINOR', MINOR /* 50 */ );
define( 'TASK', 55 );
define( 'BUG_MAJOR', MAJOR /* 60 */ );
define( 'BUG_CRASH', CRASH /* 70 */ );
define( 'BUG_BLOCK', BLOCK /* 80 */ );
define( 'TASK_BLOCK', 82 );
define( 'BUG_COMPLIANCE', 90 );
define( 'BUG_SECURITY', 92 );
define( 'BUG_LEGAL', 94 );

# reproducibility
define( 'REPRODUCIBILITY_UNABLETOREPRODUCE', REPRODUCIBILITY_UNABLETODUPLICATE /* 90 */ );

# resolution
define( 'DONE', 25 );
define( 'BY_DESIGN', WONT_FIX /* 90 */ );
define( 'INVALID', 95 );
