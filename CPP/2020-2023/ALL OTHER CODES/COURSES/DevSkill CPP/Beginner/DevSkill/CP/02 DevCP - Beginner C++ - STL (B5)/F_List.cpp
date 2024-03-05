#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n,x;
    cin >> n;
    list<int>myList;
    list<int>::iterator it = myList.end();
    list<int>::iterator temp;
    while(n--){
        int op;
        cin >> op;
        if(op == 0){
            cin >> x;
            if(myList.empty() || it == myList.begin()){
                myList.push_front(x);
                it = myList.begin();
            } 
            else{
                myList.insert(it,x);
                it--;
            } 

            // cout << *it << endl;
        }else if(op == 1){
            cin >> x;
            if(x < 0) 
            advance(it, x);
            else advance(it, x);

            // while(x++){
            //     if(it == myList.begin()) break; 
            //     it--;
            // } 
            // else {
            //     while(x--) if(it != myList.end()) it++;
            // }
            // cout << *it << endl;
        }else{
            // cout << "erase : " << *it << endl;
            myList.erase(it++);
            // cout << "current " << *it << endl;
        }
    }
    it = myList.begin();
    while(it != myList.end()){
        cout << *it++ << "\n";
    }
    
    // cout << *it << endl;
    // it = myList.end();
    // cout << *it << endl;
    
}