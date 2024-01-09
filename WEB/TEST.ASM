; 7 jun 23


; Enter First Number: 4
; Enter Second Number: 6
; You have entered 4 and 6

.MODEL SMALL
.STACK 100H
.DATA 

;VARIABLE DEFINE
MSG1 DB "Enter First Number: $" 
MSG2 DB "Enter Second Number: $" 
OUTPUT1 DB "You have entered $" 
OUTPUT2 DB " and $"

NEWLINE DB 10,13, '$' 


.CODE
MAIN PROC
    MOV AX,@DATA
    MOV DS,AX  
               
    
    MOV AH,9
    LEA DX,MSG1  ; LEA -> LOAD EFFECTIVE ADDRESS     
    INT 21H    
                
    MOV AH,1 ; INPUT
    INT 21H ; SCREEN SHOW
    MOV BH, AL  
    
    MOV AH,9
    LEA DX,NEWLINE
    INT 21H   
             ;-------------------------
    MOV AH,9
    LEA DX,MSG2  ; LEA -> LOAD EFFECTIVE ADDRESS     
    INT 21H    
                
    MOV AH,1 ; INPUT
    INT 21H ; SCREEN SHOW
    MOV CH, AL  
    
    MOV AH,9
    LEA DX,NEWLINE
    INT 21H   
    
    MOV AH,9
    LEA DX,OUTPUT1  ; LEA -> LOAD EFFECTIVE ADDRESS     
    INT 21H 
    
    MOV AH,2
    MOV DL,BH
    INT 21H  
    
    MOV AH,9
    LEA DX,OUTPUT2  ; LEA -> LOAD EFFECTIVE ADDRESS     
    INT 21H  
    
    MOV AH,2
    MOV DL,CH
    INT 21H  
         
    MOV AH,9
    LEA DX,NEWLINE
    INT 21H 
    
    ; BX -> BH BL
    ; CD -> CH CL
    ; DL -> SEND DATA
    ; AL -> BRING DATA 
    
    
    
    MOV AH,4CH ; EXIT
    INT 21H
 MAIN ENDP
 END MAIN
 
 ; AX -> 16 BITS (AH , AL)
 ; AH -> 1 ; USER INPUT
 ; AH -> 2 ; OUTPUT
 ; AH -> 9 ; STRING OUPTUT   






////////////////////////////////// 12 jun

.model small
.stack 100h   

.data 
A db "Input: $" 
B db 0ah,0dh, "Output: $"  

.code
main proc
    mov ax,@data
    mov ds,ax
    
    mov ah,9
    lea dx,A
    int 21h
    
    ;1st input
    mov ah,1
    int 21h
    mov bl,al 
    
     ;2nd input
    mov ah,1
    int 21h
    mov bh,al 
    
    ;3rd input
    mov ah,1
    int 21h
    mov cl,al
    
    ;output
    mov ah,9
    lea dx,B
    int 21h
    
    mov ah,2
    mov dl,cl
    int 21h
    
    mov ah,2
    mov dl,bh
    int 21h
    
    mov ah,2
    mov dl,bl
    int 21h  
    
    exit:
    mov ah,4ch
    int 21h
    main endp
end main
    
    


;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

.model small
.stack 100h
.data 

A db ? 
B db ?

.code
main proc                             
    
    mov ax,@data
    mov ds,ax
    
    
    MOV AH,2
    MOV DL,3Fh
    INT 21H   
    
    
    
    MOV AH,1
    INT 21H
    MOV A,AL  
    
    INT 21H
    MOV B,AL 
    
    
    ;NEWLINE
    MOV AH,2
    MOV DL,0AH
    INT 21H
    MOV DL,13
    INT 21H
    
    MOV AH,2
    MOV DL,54H  
    INT 21H
    MOV DL,48H
    INT 21H
    MOV DL,45H
    INT 21H
    
    MOV DL,20H ;SPACE
    INT 21H 
    

    MOV DL,53H  
    INT 21H
    MOV DL,55H
    INT 21H
    MOV DL,4DH
    INT 21H 
    
    MOV DL,20H ;SPACE
    INT 21H
    
    
    MOV DL,4FH  
    INT 21H
    MOV DL,46H
    INT 21H
                
    MOV DL,20H ;SPACE
    INT 21H   
    
    MOV DL,A
    INT 21H    
    
    MOV DL,20H ;SPACE
    INT 21H   
    
             
    MOV DL,41H  
    INT 21H
    MOV DL,4EH
    INT 21H
    MOV DL,44H
    INT 21H 
    
    MOV DL,20H ;SPACE
    INT 21H 
    
    MOV DL,B
    INT 21H  
    
    MOV DL,20H ;SPACE
    INT 21H
    
    MOV DL,49H  
    INT 21H
    MOV DL,53H
    INT 21H
    MOV DL,20H
    INT 21H 
    
    MOV CH,A
    ADD CH,B  
    SUB CH,30H
    
    
    MOV DL,CH
    INT 21H
    
    
    ;exit code
    exit:
    mov ah,4ch
    int 21h   
    main endp
end main  
      
    
      
      
    
    
    
    
    
    
