<?php

namespace Exactum\Efac\Enums;

enum BladeTemplateEnum: string
{
    case StandarTemplate = 'pdfs.standar_template';
    case FSEETemplate = 'pdfs.fsee_template';
    case FEXETemplate = 'pdfs.fexe_template';
    case CRETemplate = 'pdfs.cre_template';
}
