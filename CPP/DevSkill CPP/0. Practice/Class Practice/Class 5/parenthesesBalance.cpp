#include <bits/stdc++.h>
using namespace std;

bool isBalanced(string bracetSeq){
    stack<char>ch;
    
    for(int i = 0; i < bracetSeq.length(); i++){ 

        if(bracetSeq[i] == ']'){

            if(!ch.empty() && ch.top() == '['){
                if(!ch.empty()) ch.pop();
                else return false;
            }else return false;

        }else if(bracetSeq[i] == ')'){

            if(!ch.empty() & ch.top() == '('){
                if(!ch.empty()) ch.pop();
                else return false;
            }else return false;

        }else if(bracetSeq[i] == '(' || bracetSeq[i] == '['){
            ch.push(bracetSeq[i]);
            // cout << "pushed " << bracetSeq[i] << endl;
        }

        // if(bracetSeq[i] == ')' || bracetSeq[i] == ']'){
        //     if(!ch.empty()) ch.pop();
        //     else return false;
        // }else if(bracetSeq[i] == '(' || bracetSeq[i] == '['){
        //     ch.push(bracetSeq[i]);
        // }
    }
    return ch.empty();
}

void myWhile(int n){
    // cin >> skipws;
    while(n--){
        string bracetSeq;
        getline(cin,bracetSeq);
        if(bracetSeq.empty()) cout << "Yes\n";
        else{
            if(isBalanced(bracetSeq)) printf("Yes\n");
            else printf("No\n");
        }
        
    }
}
// ([()[]()])() yes 
// (([(]))) no   (([(
// )  
int main()
{
    int n;
    cin >> n;
    cin.ignore(numeric_limits<streamsize>::max(), '\n');
    myWhile(n);
}



