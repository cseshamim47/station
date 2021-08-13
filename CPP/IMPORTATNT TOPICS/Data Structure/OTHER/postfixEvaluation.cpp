#include <bits/stdc++.h>
using namespace std;

int main()
{
    // #ifndef ONLINE_JUDGE  
    //     freopen("input.txt","r",stdin);
    // #endif
    string str,temp;
    getline(cin,str);
    queue<string>digits,opperand;
    str.append(" ");
    int i = 0;
    char ch;

    while(i != str.size()){
        if(str[i] != ' '){
            string tstr;
            ch = str[i];
            tstr.push_back(ch);
            temp.append(tstr);
        }
        if(str[i] == ' '){
            digits.push(temp);
            temp = "";
        }
        i++;
    }
    
    queue<string>tempQ;
    tempQ = digits;
    double answer = 0;
    double a, b;
    a = stod(tempQ.front()); 
    tempQ.pop();
    b = stod(tempQ.front()); 
    tempQ.pop();
    if(tempQ.front() == "*") answer = a*b;
    if(tempQ.front() == "/") answer = a/b;
    if(tempQ.front() == "+") answer = a+b;
    if(tempQ.front() == "-") answer = a-b;
    tempQ.pop();
    i = 0;
    while(!tempQ.empty()){
        if(i%2 != 0){
            if(tempQ.front() == "*") answer = answer*a;
            if(tempQ.front() == "/") answer = answer/a;
            if(tempQ.front() == "+") answer = answer+a;
            if(tempQ.front() == "-") answer = answer-a;

            tempQ.pop();
        }else{
            a = 0;
            a = stod(tempQ.front()); 
            tempQ.pop();
        }
        i++;
        
    }
    cout << fixed << setprecision(4) << answer << "\n";
    str = "";
    temp = "";
    answer = 0;
}