#include <bits/stdc++.h>
using namespace std;

bool isBalanced(string bracetSeq){
    stack<char>ch;
    
    for(int i = 0; i < bracetSeq.length(); i++){ //  ))(
        if(bracetSeq[i] == ')'){
            if(!ch.empty()) ch.pop();
            else return false;
        }else if(bracetSeq[i] == '('){
            ch.push(bracetSeq[i]);
        }
    }
    return ch.empty();
}

void findPairs(string bracetSeq){

    if(isBalanced(bracetSeq)){
        stack<int>ch;
        for(int i = 0; i < bracetSeq.length(); i++){ //((())()) =  3,4  2,5  6,7   1,8
            if(bracetSeq[i] == ')'){
                if(!ch.empty()){
                    cout << ch.top() << " " << i+1 << endl;
                    ch.pop();
                } 
                
            }else if(bracetSeq[i] == '('){
                ch.push(i+1);
            }
        }
        return;
    }else cout << "Bracet sequence not valid!! \n" ;
}

int main()
{
    string bracetSeq = "";
    while(bracetSeq != "0"){
        cin >> bracetSeq;
        findPairs(bracetSeq);
        cout << "\n\n";
    }
}



