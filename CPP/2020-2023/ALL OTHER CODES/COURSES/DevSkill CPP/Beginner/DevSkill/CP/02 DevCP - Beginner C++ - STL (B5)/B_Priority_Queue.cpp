#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    string str;
    priority_queue<int> numbers;
    set<int>::iterator it;
    while(cin >> str){
        if(str == "end") break;
        if(str == "insert"){
            cin >> n;
            numbers.push(n);
        }
        if(str == "extract"){
            cout << numbers.top() << "\n";
            numbers.pop();
        }
    }
    
}