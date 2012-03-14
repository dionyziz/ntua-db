all: project_report.pdf

project_report.pdf: project_report.tex title/* files/*
		xelatex -shell-escape $<
clean:
		rm db_intro.{aux,log,pdf}
spell:
		aspell -l el_gr --ignore-case=true -c db_intro.tex
