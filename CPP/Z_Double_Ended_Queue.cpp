#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

int Case;
void solve()
{
    int s,o;
    cin >> s >> o;
    deque<int> dq;
    int cnt = 0;
    cout << "Case " << ++Case << ":" << endl;
    for(int i = 0; i < o; i++)
    {
        string str;
        int x;
        cin >> str;
        if(str == "pushLeft")
        {
            cin >> x;
            if(cnt < s)
            {
                dq.push_front(x);
                cout << "Pushed in left: " << x << endl;
                cnt++;
            }else cout << "The queue is full" << endl;
        }else if(str == "pushRight")
        {
            cin >> x;
            if(cnt < s)
            {
                dq.push_back(x);
                cout << "Pushed in right: " << x << endl;
                cnt++;
            }else cout << "The queue is full" << endl;
        }else if(str == "popLeft")
        {
            if(cnt > 0)
            {
                cout << "Popped from left: " << dq.front() << endl;
                dq.pop_front();
                cnt--;
            }else cout << "The queue is empty" << endl; 
        }else if(str == "popRight")
        {
            if(cnt > 0)
            {
                cout << "Popped from right: " << dq.back() << endl;
                dq.pop_back();
                cnt--;
            }else cout << "The queue is empty" << endl; 
        }
    }

}

int main()
{
      //        Bismillah
    w(t)
    
}