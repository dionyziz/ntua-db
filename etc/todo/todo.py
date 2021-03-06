#!/bin/env python
#/* -.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.
#
#* File Name : todo.py
#
#* Purpose :
#
#* Creation Date : 06-02-2012
#
#* Last Modified : Mon 06 Feb 2012 05:31:52 PM EET
#
#* Created By : Greg Liras <gregliras@gmail.com>
#
#_._._._._._._._._._._._._._._._._._._._._.*/

FIXED_STATUS_COLOR="green"
PENDING_STATUS_COLOR="red"
ASSIGNEE_COLOR="cyan"
MESSAGE_COLOR="blue"
from termcolor import colored

def main():
    try:
        f = open("TODO","r")
    except IOError:
        print "No TODO file found, exiting..."
        return 0

    tasks = map(lambda x : x.strip().split("--"), f.readlines() )
    for task in tasks:
        if ( task[0].startswith("*") ):
            message = task[0]
            try:
                assignee = task[1].split()[0]
            except IndexError:
                assignee = "none"
            try:
                STATUS_COLOR = FIXED_STATUS_COLOR
                status = task[2].split()[0]
            except IndexError:
                STATUS_COLOR = PENDING_STATUS_COLOR
                status = "PENDING"

            print "Message: ", colored( message, MESSAGE_COLOR )
            print "Assigned to: ", colored( assignee, ASSIGNEE_COLOR )
            print "Status: ", colored( status, STATUS_COLOR )


if __name__=="__main__":
    main()

