#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

bool isBalanced(string str)
{
    stack<char> s;
    for(int i = 0; i < str.size(); i++)
    {
        if(str[i] == '(') s.push('(');
        else
        {
            if(!s.empty()) s.pop();
            else return false;
        }
    }
    return s.empty();
}

void printIdx(string str)
{
    stack<int> s;
    vector<int> v;
    for(int i = 0; i < str.size(); i++)
    {
        if(str[i] == '(')
        {
            s.push(i);
            v.push_back(0);
        }
        else
        {
            if(!s.empty())
            {
                cout << s.top() << " " << i << endl;
                if(s.top() != 0)
                {
                    v.push_back(v[s.top()-1]+1);                    
                }else v.push_back(1);
                s.pop();
            }
            else return;
        }

    }
    int totalSub = accumulate(v.begin(),v.end(),0);
    cout << totalSub << endl;
    return;
}
void solve()
{
    string str;
    cin >> str;
    if(isBalanced(str)) cout << "Balanced" << endl;
    else cout << "Not Balanced" << endl;
    printIdx(str);
}

int32_t main()
{
    w(t)
}