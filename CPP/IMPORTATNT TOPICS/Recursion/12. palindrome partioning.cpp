#include <bits/stdc++.h>
using namespace std;

string str;
vector<string> ans;
bool isPalindrome(int l,int r)
{
    while(l < r)
    {
        if(str[l] != str[r]) return false;
        l++;
        r--;
    }
    return true;
}
int cnt;
void f(int idx)
{
    if(idx == str.size())
    {
        for(auto x : ans) cout << x << " ";
        cout << endl;
        return;
    }

    for(int i = idx; i < str.size(); i++)
    {
        cnt++;
        if(isPalindrome(idx,i))
        {
            ans.push_back(str.substr(idx,(i-idx+1)));
            f(i+1);
            ans.pop_back();
        }
    }
}

int main()
{
    cin >> str;
    f(0);
    cout << cnt << endl;

}