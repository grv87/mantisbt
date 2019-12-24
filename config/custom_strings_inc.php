<?php
# SPDX-FileCopyrightText: ©  Basil Peace
# SPDX-License-Identifier: GPL-2.0-or-later

switch( $g_active_language ) {
  case 'russian':
    # Enum Strings
    $s_project_status_enum_string = '1:рассматривается,2:отложен,5:планируется,10:в разработке,50:стабильный,70:устарел';
    $s_status_enum_string = '10:новая,20:требует обратной связи,40:ожидает оценки,42:ожидает приоритизации,44:ожидает планирования,46:ожидает назначения,49:help wanted,50:назначена,55:в работе,80:требует верификации,90:закрыта';

    $s_new_bug_title = 'Создание задачи';
    $s_feedback_required_bug_title = 'Запрос обратной связи';
    $s_pending_estimation_bug_title = 'Подтверждение задачи';
    $s_pending_prioritization_bug_title = 'Оценка задачи';
    $s_pending_planning_bug_title = 'Приоритизация задачи';
    $s_pending_assignment_bug_title = 'Планирование задачи';
    $s_help_wanted_bug_title = 'Запрос помощи';
    $s_assigned_bug_title = 'Назначение задачи';
    $s_in_progress_bug_title = 'Начало работы';
    $s_verification_required_bug_title = 'Окончание работы';
    $s_closed_bug_title = 'Закрытие задачи';

    $s_new_bug_button = 'Создать задачу';
    $s_feedback_required_bug_button = 'Запросить обратную связь';
    $s_pending_estimation_bug_button = 'Подтвердить задачу';
    $s_pending_prioritization_bug_button = 'Оценить задачу';
    $s_pending_planning_bug_button = 'Установить приоритет';
    $s_pending_assignment_bug_button = 'Запланировать задачу';
    $s_help_wanted_bug_button = 'Запросить помощь';
    $s_assigned_bug_button = 'Назначить';
    $s_in_progress_bug_button = 'Начать работу';
    $s_verification_required_bug_button = 'Решить';
    $s_closed_bug_button = 'Закрыть задачу';

    $s_email_notification_title_for_status_bug_new = 'Следующей задаче присвоено состояние НОВАЯ (повторно):';
    $s_email_notification_title_for_status_bug_feedback_required = 'По следующей задаче от вас НУЖНА ОБРАТНАЯ СВЯЗЬ:';
    $s_email_notification_title_for_status_bug_pending_estimation = 'Следующая задача ПОДТВЕРЖДЕНА и ОЖИДАЕТ ОЦЕНКИ:';
    $s_email_notification_title_for_status_bug_pending_prioritization = 'Следующая задача ОЖИДАЕТ ПРИОРИТИЗАЦИИ:';
    $s_email_notification_title_for_status_bug_pending_planning = 'Следующая задача ОЖИДАЕТ ПЛАНИРОВАНИЯ:';
    $s_email_notification_title_for_status_bug_pending_assignment = 'Следующая задача ОЖИДАЕТ НАЗНАЧЕНИЯ:';
    $s_email_notification_title_for_status_bug_help_wanted = 'Следующая задача требует ПОМОЩИ:';
    $s_email_notification_title_for_status_bug_assigned = 'Следующая задача НАЗНАЧЕНА:';
    $s_email_notification_title_for_status_bug_in_progress = 'Следующая задача В ПРОЦЕССЕ решения:';
    $s_email_notification_title_for_status_bug_verification_required = 'Следующая задача решена и ТРЕБУЕТ вашей ВЕРИФИКАЦИИ:';
    $s_email_notification_title_for_status_bug_closed = 'Следующая задача ЗАКРЫТА:';

    $s_priority_enum_string = '10:нет,15:совершенствование,20:низкий,30:средний,40:высокий,60:немедленный';
    $s_severity_enum_string = '5:вопрос,8:пользовательская история,10:новая возможность,12:расширение,20:баг-пустяк,30:баг-текст,50:баг-малый,55:задача,60:баг-большой,70:баг-падение,80:баг-блокирующий,82:задача-блокирующая,90:баг-комплайенс,92:баг-безопасность,94:баг-правовой';
    $s_reproducibility_enum_string = '10:всегда,30:иногда,50:произвольно,70:не проверялась,90:не воспроизводится,100:неприменимо';
    $s_resolution_enum_string = '10:открыта,20:исправлено,25:выполнена,30:переоткрыта,40:не удаётся воспроизвести,60:повтор,90:как задумано,95:ошибочная';

    $s_estimated_workload = 'Оценка затрат времени';
    $s_work_progression = 'Прогресс работы';
    $s_done_workload = 'Фактические затраты времени';

    break;

  default: # english
    # Enum Strings
    $s_project_status_enum_string = '1:considered,2:postponed,5:planned,10:in development,50:stable,70:obsolete';
    $s_status_enum_string = '10:new,20:feedback required,40:pending estimation,42:pending prioritization,44:pending planning,46:pending assignment,49:help wanted,50:assigned,55:in progress,80:verification required,90:closed';

    $s_new_bug_title = 'New Issue';
    $s_feedback_required_bug_title = 'Request Feedback';
    $s_pending_estimation_bug_title = 'Confirm Issue';
    $s_pending_prioritization_bug_title = 'Estimate Issue';
    $s_pending_planning_bug_title = 'Prioritize Issue';
    $s_pending_assignment_bug_title = 'Plan Issue';
    $s_help_wanted_bug_title = 'Request Help';
    $s_assigned_bug_title = 'Assign Issue';
    $s_in_progress_bug_title = 'Start Work';
    $s_verification_required_bug_title = 'Finish Work';
    $s_closed_bug_title = 'Close Issue';

    $s_new_bug_button = 'New Issue';
    $s_feedback_required_bug_button = 'Request Feedback';
    $s_pending_estimation_bug_button = 'Confirm Issue';
    $s_pending_prioritization_bug_button = 'Estimate Issue';
    $s_pending_planning_bug_button = 'Prioritize Issue';
    $s_pending_assignment_bug_button = 'Plan Issue';
    $s_help_wanted_bug_button = 'Request Help';
    $s_assigned_bug_button = 'Assign Issue';
    $s_in_progress_bug_button = 'Start Work';
    $s_verification_required_bug_button = 'Finish Work';
    $s_closed_bug_button = 'Close Issue';

    # E-mail Strings
    $s_email_notification_title_for_status_bug_new = 'The following issue is now in status NEW (again):';
    $s_email_notification_title_for_status_bug_feedback_required = 'The following issue requires your FEEDBACK:';
    $s_email_notification_title_for_status_bug_pending_estimation = 'The following issue has been confirmed and is PENDING ESTIMATION:';
    $s_email_notification_title_for_status_bug_pending_prioritization = 'The following issue is PENDING PRIORITIZATION:';
    $s_email_notification_title_for_status_bug_pending_planning = 'The following issue is PENDING PLANNING:';
    $s_email_notification_title_for_status_bug_pending_assignment = 'The following issue is PENDING ASSIGNMENT:';
    $s_email_notification_title_for_status_bug_help_wanted = 'The following issue requires HELP:';
    $s_email_notification_title_for_status_bug_assigned = 'The following issue has been ASSIGNED:';
    $s_email_notification_title_for_status_bug_in_progress = 'The following issue is IN PROGRESS:';
    $s_email_notification_title_for_status_bug_verification_required = 'The following issue has been resolved and REQUIRES your VERIFICATION:';
    $s_email_notification_title_for_status_bug_closed = 'The following issue has been CLOSED:';

    $s_priority_enum_string = '10:none,15:perfecting,20:low,30:medium,40:high,60:immediate';
    $s_severity_enum_string = '5:question,8:user story,10:new feature,12:enhancement,20:bug-trivial,30:bug-text,50:bug-minor,55:task,60:bug-major,70:bug-crash,80:bug-block,82:task-block,90:bug-compliance,92:bug-security,94:bug-legal';
    $s_reproducibility_enum_string = '10:always,50:random,70:have not tried,90:unable to reproduce,100:N/A';
    $s_resolution_enum_string = '10:open,20:fixed,25:done,30:reopened,40:unable to reproduce,60:duplicate,90:by design,95:invalid';

    $s_estimated_workload = 'Estimated Workload';
    $s_work_progression = 'Work Progression';
    $s_done_workload = 'Done Workload';

    break;
}
