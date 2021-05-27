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


int main()
{
    string bracetSeq = "";
    while(bracetSeq != "0"){
        cin >> bracetSeq;
        cout << bracetSeq << " ---> " << isBalanced(bracetSeq) << endl;
    }
}



