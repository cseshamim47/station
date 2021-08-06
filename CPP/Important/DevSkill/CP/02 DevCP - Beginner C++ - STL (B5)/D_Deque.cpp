#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    deque<int> query;
    deque<int>::iterator it;
    int first;
    while(cin >> first){
        if(first == 0){
            int d,x;
            cin >> d >> x;
            if(d==0) query.push_front(x);
            else query.push_back(x);
            
        }else if(first == 1){
            int p;
            cin >> p;
            it = query.begin();
            cout << *(it+p) << "\n";
        }else if(first == 2){
            int d;
            cin >> d;
            if(d == 0) query.pop_front();
            else query.pop_back();
        }

    }
    
}