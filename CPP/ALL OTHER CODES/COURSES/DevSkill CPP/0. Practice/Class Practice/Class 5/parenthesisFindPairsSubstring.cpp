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
    int size = bracetSeq.size();
    int arr[size] = {0};

    if(isBalanced(bracetSeq)){
        stack<int>ch;
        for(int i = 0; i < bracetSeq.length(); i++){
            char bs = bracetSeq[i];
            if(bs == ')'){ 

                if(!ch.empty()){
                    int prevIndex = ch.top()-1;
                    if(prevIndex >= 0 && bracetSeq[prevIndex] == ')') arr[i] = 1 + arr[prevIndex];
                    else arr[i] += 1;
                    ch.pop();
                } 
                
            }else if(bs == '(') ch.push(i);
        }
        cout << "Total valid substring : " << accumulate(arr,arr+size,0) << "\n\n";
        return;
    }else cout << "Bracet sequence not valid!! \n\n" ;
}

int main()
{
    string bracetSeq = "";
    while(bracetSeq != "0"){
        cin >> bracetSeq;
        findPairs(bracetSeq);
    }
}



