all: db_intro.pdf
db_intro.pdf: db_intro.tex title/* 
		pdflatex -shell-escape db_intro.tex
clean:
		rm db_intro.{aux,log,pdf}
spell:
		aspell -l el_gr --ignore-case=true -c db_intro.tex
